<?php
namespace CBSoftwareDev\Form\Input;

use CBSoftwareDev\Form\Style\Group;


abstract class BaseInput implements \Stringable {
    /**
     * Is the input required
     * first array element is required, second is allowAnyNoneEmptyString
     * @var array
     */
    protected array $required = [false];

    /**
     * Relationship to database table
     * @var array
     */
    protected ?array $relationship = null;

    /**
     * field name
     * @var string
     */
    protected string $name;

    public function getName(): string {
        return $this->name;
    }

    public function getRules(array $rules = []): string
    {
        if($this->required[0]) {
            $rules[] = "required";
        }
        return implode(",",$rules);
    }
    
    /**
     * Set the is required value
     * @param bool $allowAnyNoneEmptyString Allow any none empty string, for example, 0 or false or null
     * @return static
     */
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