<?php

namespace CBSoftwareDev\Form\Input;

class Image extends BaseInput
{
    protected string $type = "file";
    protected string $accept = "image/*";
    protected string $placeholder = "Choose an image";
    protected string $class = "block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm";
    protected string $name = "image";
    protected string $id = "image";
    protected string $value = "";
    protected string $label = "Image";
    protected string $help = "";
    protected bool $disabled = false;
    protected bool $readonly = false;
    protected bool $multiple = false;

    public static function make(string $name): static
    {
        return new static($name);
    }

    public function __construct(string $name) {
        $this->name = $name;
        $this->id = $name;
    }

    public function render(?\CBSoftwareDev\Form\Form $form = null): string
    {
        $html = "<label for=\"{$this->id}\" class=\"block text-sm font-medium text-gray-700\">{$this->label}</label>";
        $html .= "<input type=\"{$this->type}\" name=\"{$this->name}\" id=\"{$this->id}\" value=\"{$this->value}\" class=\"{$this->class}\" placeholder=\"{$this->placeholder}\"";
        if($this->required[0]) {
            $html .= " required";
        }
        if($this->disabled) {
            $html .= " disabled";
        }
        if($this->readonly) {
            $html .= " readonly";
        }
        if($this->multiple) {
            $html .= " multiple";
        }
        $html .= ">";
        if($this->help) {
            $html .= "<p class=\"mt-2 text-sm text-gray-500\">{$this->help}</p>";
        }
        return $html;
    }

    public function __tostring(): string
    {
        return $this->render();
    }
}