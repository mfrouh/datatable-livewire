<?php

namespace MFrouh\DataTable\Datatables\Traits;

/**
 * WithSelection
 */
trait WithSelection
{
    public bool $selectAll = false;

    public array $selected = [];

    public function updatedSelectAll($value)
    {
        if ($value) {
            $this->initializeQuery();
            $this->selected = $this->query->pluck('id')->map(fn ($item) => (string) $item)->toArray();
        } else {
            $this->selected = [];
        }
    }

    public function updatedSelected()
    {
        $this->selectAll = false;
    }

    public function deleteSelected()
    {
        $this->model::whereIn('id', $this->selected)->delete();
        $this->selected = [];
        $this->selectAll = false;
    }
}
