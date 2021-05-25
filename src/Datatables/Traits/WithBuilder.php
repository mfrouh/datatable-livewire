<?php

namespace MFrouh\DataTable\Datatables\Traits;

use Illuminate\Support\Str;

/**
 * WithBuilder
 */
trait WithBuilder
{
    protected $model;

    protected $query;

    public string $search = '';

    public int $perPage = 5;

    public array $perPages = [5, 10, 25, 50, 75, 100];

    protected array $searchable = [];

    public array $filters = [];

    public $columns;

    protected array $uniqueFilterColumn = [];

    public $countActionsPerimssions = 0;

    public function query()
    {
        $this->handleColumns();

        $this->handleActions();

        $this->handleCountPermissions();

        $q = $this->queryBuilder();

        $this->handleFilters($q);

        $this->handleSearchs($q);

        $this->handleSorts($q);

        return $q->paginate($this->perPage);
    }

    public function initializeQuery()
    {
        $this->query = $this->query();
    }
}
