<?php

namespace CBSoftwareDev\Form\Input;

use CBSoftwareDev\Form\Form;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Collection;

class Select extends BaseInput {
    protected array $options = [];

    public static function make(string $name): static
    {
        return new static($name);
    }

    public function getRules(array $rules = []): string
    {
        $rules[] = "in:".implode(",",array_keys($this->options));
        
        return parent::getRules($rules);
    }


    public function __construct(protected string $name) {
    }
    public function options(array|Collection $options): static
    {
        if( $options instanceof Collection) {
            $this->options = $options->toArray();
        } else {
            $this->options = $options;
        }
        
        return $this;
    }
    protected function GetOptions(?Form $form): string
    { 
        $oldValue = "";
        if($form) {
            $oldValue = $form->getRawValue($this->name);
        }
        
        $options = "";
        
        foreach ($this->options as $key => $value) {
            $options .= "<option value=\"{$key}\"".($oldValue == $key?" selected":"").">{$value}</option>";
        }
        return $options;
    }
    public function render(?Form $form = null): string
    {
       
        return "
        <label for=\"{$this->name}\" class=\"block mb-2 text-sm font-medium text-gray-500 border-gray-500 dark:text-white 
        dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:ring-0  peer\">Select an option</label>

        <select id=\"{$this->name}\" name=\"{$this->name}\" class=\"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500\">
            <option selected>Choose a country</option>
            ".$this->GetOptions($form)."
        </select>
        ";
        //        <textarea type=\"{$this->type()}\" name=\"{$this->name}\" id=\"{$this->name}\" ".$this->GetLengthAttribute()." class=\"block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer\" placeholder=\" \" ".($this->required[0]?"required ":"").">".$oldValue."</textarea>

    }

    public function __toString(): string
    {
        return $this->render();
    }
}