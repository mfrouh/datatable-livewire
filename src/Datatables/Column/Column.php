<?php

namespace MFrouh\DataTable\Datatables\Column;

use MFrouh\DataTable\Datatables\Column\ColumnInterface;

abstract class Column implements ColumnInterface
{
    public $label;

    public $type = 'Text';

    public $name;

    public $filterable = false;

    public $sortable = false;

    public $searchable = false;

    public $options;

    public $value;

    public static function name(string $name, string|null $value = null)
    {
        $column = new static;
        $column->name = $name;
        $column->value = $value ?? $name;

        return $column;
    }

    public function label(string $label)
    {
        $this->label = $label;

        return $this;
    }

    public function filterable(array $options)
    {
        $this->filterable = true;

        $this->options = $options;

        return $this;
    }

    public function sortable()
    {
        $this->sortable = true;

        return $this;
    }

    public function searchable()
    {
        $this->searchable = true;

        return $this;
    }
}
