<?php

namespace MFrouh\DataTable\Datatables\Column;

interface ColumnInterface
{
    public static function name(string $name, string|null $value = null);

    public function label(string $label);

    public function filterable(array $options);

    public function sortable();

    public function searchable();
}
