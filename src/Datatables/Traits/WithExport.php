<?php

namespace MFrouh\DataTable\Datatables\Traits;

use Exception;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

/**
 * WithExport
 */
trait WithExport
{

    public string $exportFile = '';

    public array $exportTypes =
    [
        'xlsx' => 'setting.excel',
        'csv'  => 'setting.csv',
    ];

    /**
     * export all data
     *
     * @param mixed $type
     *
     * @return BinaryFileResponse
     */
    public function exportAll(string $type): BinaryFileResponse
    {
        if (in_array($type, ['xlsx', 'csv']) && class_exists($this->exportFile)) {
            return Excel::download(new $this->exportFile, "$this->alldata.$type");
        }
        return throw new Exception("Error Type File incorrect or ('" . $this->exportFile . "') not exist");
    }


    /**
     * @param string $type
     *
     * @return BinaryFileResponse
     */
    public function exportSelected(string $type): BinaryFileResponse
    {
        if (in_array($type, ['xlsx', 'csv']) && class_exists($this->exportFile)) {
            return Excel::download(new $this->exportFile($this->selected), "$this->alldata.$type");
        }
        return throw new Exception("Error Type File incorrect or ('" . $this->exportFile . "') not exist");
    }
}
