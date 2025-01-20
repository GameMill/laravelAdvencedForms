<?php

namespace CBSoftwareDev\Table\Columns;

class Column {

    private bool $sortable = false;
    
    public static function make(string $name, string $label): self
    {
        return new self($name, $label);
    }

    public function __construct(private string $name, private string $label) {
        
    }

    public function sortable(): self
    {
        $this->sortable = true;
        return $this;
    }
}