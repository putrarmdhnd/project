<?php

namespace App\Imports;

use App\Models\bansos;
use Maatwebsite\Excel\Concerns\ToModel;

class bansosImport implements ToModel
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        return new bansos([
            'NIK' => $row[1],
            'namaLengkap' => $row[2],
        ]);
    }
}
