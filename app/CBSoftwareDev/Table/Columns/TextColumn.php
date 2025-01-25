<?php
namespace CBSoftwareDev\Table\Columns;

use App\CBSoftwareDev\Table\Table;

class TextColumn extends Column {



    public function getValue(Table $table, int $nRow): string
    {
        return $table->getData()[$nRow][$this->name];
    }
}