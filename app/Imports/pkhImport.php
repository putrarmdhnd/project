<?php

namespace App\Imports;

use App\Models\pkh;
use Maatwebsite\Excel\Concerns\ToModel;

class pkhImport implements ToModel
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        return new pkh([
            'NIK' => $row[1],
            'namaLengkap' => $row[2],
        ]);
    }
}
