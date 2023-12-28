<?php

namespace App\Imports;

use App\Models\anakyatim;
use Maatwebsite\Excel\Concerns\ToModel;

class anakyatimImport implements ToModel
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        return new anakyatim([
            'NIK' => $row[1],
            'namaLengkap' => $row[2],
        ]);
    }
}
