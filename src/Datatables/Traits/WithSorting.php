<?php

namespace MFrouh\DataTable\Datatables\Traits;

/**
 * WithSorting
 */
trait WithSorting
{
    public string $sortBy = 'id';

    public string $sortDirection = 'asc';

    public function sortBy($field)
    {
        $this->sortDirection = $this->sortBy === $field
            ? $this->reverseSort()
            : 'asc';

        $this->sortBy = $field;
    }

    public function reverseSort(): string
    {
        return $this->sortDirection === 'asc'
            ? 'desc'
            : 'asc';
    }
}
