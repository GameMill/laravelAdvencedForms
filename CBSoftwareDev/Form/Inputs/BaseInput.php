<?php
namespace CBSoftwareDev\Form\Input;

abstract class BaseInput implements \Stringable {
    private array $required = [false];
    private ?array $relationship = null;


    public function required(bool $allowAnyNoneEmptyString=false): static
    {
        $this->required = [true,$allowAnyNoneEmptyString];
        return $this;
    }

    public function relationship(string $tableName, string $columnName): static
    {
        $this->relationship = [$tableName, $columnName];
        return $this;
    }
}