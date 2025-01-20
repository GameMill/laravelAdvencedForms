<?php
namespace CBSoftwareDev\Form\Input;

use CBSoftwareDev\Form\Form;

class TextInput extends BaseInput {

    public function type() {
        return 'text';
    }
    public static function make(string $name): self
    {
        return new self($name);
    }

    public function __construct(private string $name) {

    }

    public function __tostring(): string
    {
        return $this->render();
        
    }

    public function render(?Form $form = null): string
    {
        
        $oldValue = "";
        if($form) {
            $oldValue = $form->getRawValue($this->name);
        }
        return "
        <input type=\"{$this->type()}\" name=\"{$this->name}\" id=\"{$this->name}\" value=\"".$oldValue."\" class=\"block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer\" placeholder=\" \" required />
        <label for=\"{$this->name}\" class=\"peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6\">{$this->name}</label>
        ";
    }
}