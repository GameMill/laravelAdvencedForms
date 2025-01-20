<?php
namespace CBSoftwareDev\Table;

class Table {
    public static function make(array $columns): self
    {
        return new self($columns);
    }

    public function __construct(private array $columns) {
        
    }



    public function __tostring(): string
    {
        $html = "<table>";
        $html .= "<thead>";
        $html .= "<tr>";
        foreach ($this->schema as $column) {
            $html .= "<th>{$column->getName()}</th>";
        }
        $html .= "</tr>";
        $html .= "</thead>";
        $html .= "<tbody>";
        foreach ($this->schema as $row) {
            $html .= "<tr>";
            foreach ($this->schema as $column) {
                $html .= "<td>{$column->getValue()}</td>";
            }
            $html .= "</tr>";
        }
        $html .= "</tbody>";
        $html .= "</table>";
        return $html;
    }
}