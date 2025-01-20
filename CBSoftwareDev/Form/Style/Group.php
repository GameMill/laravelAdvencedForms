<?php

namespace CBSoftwareDev\Form\Style;

use CBSoftwareDev\Form\Form;

class Group implements \Stringable {

    public static function make(int $columns, array $inputs): static
    {
        return new static($columns, $inputs);
    }

    public function __construct(private int $columns, private array $inputs) {
        
    }

    public function __tostring(): string
    {
        return $this->render();
    }

    
    public function render(?Form $form = null) {

        $html = "<div class=\"grid md:grid-cols-".$this->columns." md:gap-6\">";
        foreach ($this->inputs as $input) {
            $html .= "<div class=\"relative z-0 w-full mb-5 group\">" .
            $input->render($form) .
            "</div>";
        }
        $html .= "</div>";
        return $html;
    }
}