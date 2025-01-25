<?php

namespace App\CBSoftwareDev\Table;

require_once __DIR__ . '/Columns/Column.php';
require_once __DIR__ . '/Columns/TextColumn.php';

use ArrayAccess;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Database\Eloquent\Collection;

class Table {

    private array $data = [];

    public static function make(array $columns): static
    {
        
        return new self($columns);
    }

    public function __construct(public array $columns = []) {
        
    }

    public function setData(array|Collection  $data): static
    {
        if($data instanceof Collection) {
            $this->data = $data->toArray();
        } else {
            $this->data = (array) $data;
        } 
        return $this;
    }

    public function getData(): array
    {
        return clock($this->data);
    }

    public function columns(array $columns): static
    {
        $this->columns = $columns;
        return $this;
    }

    public function paginate(int $perPage): static
    {
        $this->data = array_slice($this->data, 0, $perPage);
        return $this;
    }



}