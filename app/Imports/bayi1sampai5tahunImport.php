<?php

namespace App\Imports;

use App\Models\bayi1sampai5tahun;
use Maatwebsite\Excel\Concerns\ToModel;

class bayi1sampai5tahunImport implements ToModel
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        return new bayi1sampai5tahun([
            'NIK' => $row[1],
            'namaLengkap' => $row[2],
        ]);
    }
}
