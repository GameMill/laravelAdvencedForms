<?php
namespace CBSoftwareDev\Form;

use CBSoftwareDev\Form\Style\Group;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class Form implements \Stringable {

    public int $columns = 2;
    

    public static function make(array $schema, ?Model $model = null): static
    {
        return new static($schema, $model);
    }

    public function __construct(private array $schema,private ?Model $model = null) {
        
    }

    public function getRawValue(string $name) {
        $request = app('request');
        $PostData = $request->all();
        if(count($PostData) > 0) {
            if(array_key_exists($name, $PostData)) {
                return $PostData[$name];
            }
            return "";
        } elseif($this->model) {
            return $this->model->$name;
        }
    }

    public function Validate(): array
    {
       return app("request")->validate(rules: $this->getRules());

    }

    public function columns(int $columns): static
    {
        if($columns < 1) {
            throw new \InvalidArgumentException("Columns must be greater than 0");
        }
        $this->columns = $columns;

        return $this;
    }

    public function getRules(): array
    {
        $rules = [];
        foreach ($this->schema as $input) {
            $rules[$input->getName()] = $input->getRules();
        }
        return $rules;
    }

    public function trySave(): void {
        $data = $this->Validate();

        if($this->model) {
            $this->model->update($data);
        } else {
            //$this->model = new $$ModelName();
            //$this->model = $this->model->create($data);
        }
    }
    
    public function __tostring(): string
    {
        $html = "<form class=\"m-3\" method=\"POST\" enctype=\"multipart/form-data\">
            <input type=\"hidden\" name=\"_token\" value=\"".csrf_token()."\" />

        ";
        $currentColumn = 0;
        $InputsForGroup = [];
        if($this->columns > 1) {
            foreach ($this->schema as $input) {
                $InputsForGroup[] = $input;
                if($currentColumn++ == $this->columns - 1)
                {
                    $html .= Group::make($this->columns, $InputsForGroup)->render($this);
                    $InputsForGroup = [];
                }  
            }
            if($currentColumn > 0) {
                $html .= Group::make($this->columns, $InputsForGroup)->render($this);
            }
        } else {
                $html .= Group::make($this->columns, $this->schema)->render($this);
        }
        
        $sButton = $this->model ? "Update" : "Create";
        $html .= "<button type=\"submit\" class=\"text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800\">".$sButton."</button>" .
                 "</form>";   
        return $html;
    }
}