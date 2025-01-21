<?php

namespace CBSoftwareDev\Form\Style;

use CBSoftwareDev\Form\BaseInputGetRules;
use CBSoftwareDev\Form\Form;

class Group implements \Stringable
{
    use BaseInputGetRules;

    public static function make(int $columns, array $inputs): static
    {
        return new static($columns, $inputs);
    }

    public function __construct(private int $columns, private array $inputs) {}

    public function __tostring(): string
    {
        return $this->render();
    }


    public function render(?Form $form = null)
    {
        $html = "";
        $html .= "<div class=\"grid md:grid-cols-" . $this->columns . " md:gap-6\">";
        for ($i = 0; $i < $this->columns; $i++) {

            $InputsForGroup = [];
            $html .= "<div class=\"relative\">";

            for ($ib = $i; $ib < count($this->inputs); $ib += $this->columns) {
                $html .= "<div class=\"relative z-0 w-full mb-5 group\">";

                $html .= $this->inputs[$ib]->render($form);
                $html .= "</div>";

            }
            $html .= "</div>";

        }
        $html .= "</div>";


        return $html;
    }
}
