<?php

namespace MFrouh\DataTable\Datatables\Traits;

use Illuminate\Support\Str;

/**
 * Handles
 */
trait Handles
{
    public function handleColumns()
    {
        $this->columns = $this->columns();
        foreach ($this->columns() as  $value) {
            $value->searchable ? $this->searchable[]          = $value->name    : '';
            $value->filterable ? $this->filters[$value->name] = $value->options : '';
        }
    }

    public function handleActions()
    {
        foreach ($this->actions() as  $value) {
            $value->headerEvents ? $this->headerEvents[$value->label] = $value->headerEvents : '';
            $value->headerUrls   ? $this->headerUrls[$value->label]   = $value->headerUrls   : '';
            $value->actionEvents ? $this->actionEvents[$value->label] = $value->actionEvents : '';
            $value->actionUrls   ? $this->actionUrls[$value->label]   = $value->actionUrls   : '';
        }
    }

    public function handleFilters($q)
    {
        if (count($this->filters) != 0) {

            foreach ($this->filters as $key => $value) {
                if ($this->$key != null) {
                    if (!Str::contains($key, '.')) {
                        if (in_array($key, $this->uniqueFilterColumn)) {
                            $q->$key($this->$key);
                        } else {
                            $q->where($key, $this->$key);
                        }
                    } else {
                        $q->WhereHas(Str::beforeLast($key, '.'), function ($u) use ($key) {
                            $u->where(Str::afterLast($key, '.'), $this->$key);
                        });
                    }
                }
            }
        }
    }

    public function handleSearchs($q)
    {
        if (count($this->searchable) != 0) {
            $q->where(function ($j) {
                foreach ($this->searchable as $key => $value) {

                    if (!Str::contains($value, '.')) {
                        $j->orwhere($value, 'like', '%' . $this->search . '%');
                    } else {
                        $j->orWhereHas(Str::beforeLast($value, '.'), function ($u) use ($value) {
                            $u->where(Str::afterLast($value, '.'), 'like', '%' . $this->search . '%');
                        });
                    }
                }
            });
        }
    }

    public function handleSorts($q)
    {
        if ($this->sortBy) {
            if (!Str::contains($this->sortBy, '.')) {
                $q->orderby($this->sortBy, $this->sortDirection);
            } else {
                $key = $this->sortBy;
                $value = $this->sortDirection;
                $q->WhereHas(Str::beforeLast($this->sortBy, '.'), function ($u) use ($key, $value) {
                    $u->orderby(Str::afterLast($key, '.'), $value);
                });
            }
        }
    }

    public function handleCountPermissions()
    {
        if (auth()->check()) {
            $arr = [];
            foreach ($this->actionEvents + $this->actionUrls as $key => $value) {
                if (auth()->user()->can($this->tablePermissions[$key])) {
                    $arr[] = $value;
                }
            }
            $this->countActionsPerimssions = count($arr);
        }
        $this->countActionsPerimssions = 1;
    }
}
