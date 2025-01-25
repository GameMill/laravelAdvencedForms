<?php

namespace CBSoftwareDev\Table\Columns;

class Column {

    private bool $sortable = false;
    
    public static function make(string $name, string $label): static
    {
        return new static($name, $label);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function __construct(protected string $name, protected string $label) {
        
    }

    public function sortable(): static
    {
        $this->sortable = true;
        return $this;
    }
}