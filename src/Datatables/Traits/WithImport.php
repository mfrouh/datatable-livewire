<?php

namespace MFrouh\DataTable\Datatables\Traits;

use Maatwebsite\Excel\Facades\Excel;

/**
 * WithImport
 */
trait WithImport
{

    public string $importFile = '';

    /**
     * @param string $type
     *
     */
    public function import(string $type): void
    {
        Excel::import(new $this->importFile, "$this->alldata.$type");
    }
}
