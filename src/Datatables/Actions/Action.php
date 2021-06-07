<?php

namespace MFrouh\DataTable\Datatables\Actions;

class Action
{
    public $actionEvents;

    public $actionUrls;

    public $headerEvents;

    public $headerUrls;

    public $label;

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

    public function url($url)
    {
        if ($this->type == 'action') {
            $this->actionUrls = $url;
        } else {
            $this->headerUrls = $url;
        }

        return $this;
    }

    public function event($event)
    {
        if ($this->type == 'action') {
            $this->actionEvents = $event;
        } else {
            $this->headerEvents = $event;
        }

        return $this;
    }

    public function label($label)
    {
        $this->label = $label;

        return $this;
    }
}
