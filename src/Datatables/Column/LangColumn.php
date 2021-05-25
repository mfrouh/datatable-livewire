<?php

namespace MFrouh\DataTable\Datatables\Column;

use MFrouh\DataTable\Datatables\Column\Column;


class LangColumn extends Column
{
    public $filename;

    public function __construct()
    {
        $this->type = 'Lang';
    }

    public function filename($file)
    {
        $this->filename = $file;

        return $this;
    }
}
