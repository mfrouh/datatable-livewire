<?php

namespace MFrouh\DataTable\Datatables\Actions;

class Action
{
    public $actionEvents = [];

    public $actionUrls = [];

    public $headerEvents = [];

    public $headerUrls = [];


    public static function header()
    {
        $action = new static;
        $action->type = 'header';

        return $action;
    }

    public static function action()
    {
        $action = new static;
        $action->type = 'action';

        return $action;
    }

    public function events(array $events)
    {
        if ($this->type == 'header') {
            $this->headerEvents = $events;

            return $this;
        }

        if ($this->type == 'action') {
            $this->actionEvents = $events;

            return $this;
        }
    }

    public function urls(array $urls)
    {
        if ($this->type == 'header') {
            $this->headerUrls = $urls;

            return $this;
        }

        if ($this->type == 'action') {
            $this->actionUrls = $urls;

            return $this;
        }
    }
}
