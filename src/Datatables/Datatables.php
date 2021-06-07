<?php

namespace MFrouh\DataTable\Datatables;

use MFrouh\DataTable\Datatables\Traits\Handles;
use MFrouh\DataTable\Datatables\Traits\WithAction;
use MFrouh\DataTable\Datatables\Traits\WithBuilder;
use MFrouh\DataTable\Datatables\Traits\WithExport;
use MFrouh\DataTable\Datatables\Traits\WithSelection;
use MFrouh\DataTable\Datatables\Traits\WithSorting;
use Livewire\WithPagination;
use Livewire\Component;
use Illuminate\Contracts\View\View;

abstract class Datatables extends Component
{
    use WithPagination, WithSorting, WithSelection, WithAction, WithExport, WithBuilder ,Handles;

    public string $createId;

    public string $tableName = '';

    public array $headerUrls = [];

    public array $headerEvents = [];

    public array $tablePermissions = [];

    protected $listeners = ['refresh'];

    public function refresh(): bool
    {
        return true;
    }

    public function queryBuilder()
    {
        return $this->model::query();
    }

    public function actions()
    {
        return [];
    }

    /**
     * @return View
     */
    public function render(): View
    {
        $this->initializeQuery();

        return view('datatables::datatable.datatable', ['alldata' => $this->query]);
    }
}
