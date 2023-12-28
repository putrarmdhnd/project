<?php

namespace App\Imports;

use App\Models\bps;
use Maatwebsite\Excel\Concerns\ToModel;

class bpsImport implements ToModel
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        return new bps([
            'NIK' => $row[1],
            'namaLengkap' => $row[2],
        ]);
    }
}
