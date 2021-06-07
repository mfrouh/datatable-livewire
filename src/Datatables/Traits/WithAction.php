<?php

namespace MFrouh\DataTable\Datatables\Traits;

/**
 * WithAction
 */
trait WithAction
{
    public array $actionEvents= [];

    public array $actionUrls= [];

    public array $modals = [];

    public $modal;

    public function create($id = null)
    {
        $this->modal =  $this->tableName . '.create';
        $this->emit('create', $id);
        $this->dispatchBrowserEvent('open-modal');
    }

    public function edit($id)
    {
        $this->modal = $this->tableName . '.edit';
        $this->emit('edit-' . $this->tableName, $id);
    }

    public function delete($id)
    {
        $model = $this->model::find($id);
        if (!$model) {
            return true;
        }
        $model->delete();
    }
}
