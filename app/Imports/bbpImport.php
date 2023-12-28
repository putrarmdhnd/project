<?php

namespace App\Imports;

use App\Models\bbp;
use Maatwebsite\Excel\Concerns\ToModel;

class bbpImport implements ToModel
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        return new bbp([
            'NIK' => $row[1],
            'namaLengkap' => $row[2],
        ]);
    }
}
