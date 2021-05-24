<?php

namespace MFrouh\DataTable\Datatables\Column;

use MFrouh\DataTable\Datatables\Column\Column;


class DateTimeColumn extends Column
{
    public $format;

    public function __construct()
    {
        $this->type = 'DateTime';
    }

    public function format($format)
    {
        $this->format = $format;

        return $this;
    }
}
