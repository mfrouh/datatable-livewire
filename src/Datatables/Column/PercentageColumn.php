<?php

namespace MFrouh\DataTable\Datatables\Column;

use MFrouh\DataTable\Datatables\Column\Column;


class PercentageColumn extends Column
{
    public function __construct()
    {
        $this->type = 'Percentage';
    }
}
