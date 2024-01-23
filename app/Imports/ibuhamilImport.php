<?php

namespace App\Imports;

use App\Models\ibuhamil;
use Maatwebsite\Excel\Concerns\ToModel;

class ibuhamilImport implements ToModel
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        return new ibuhamil([
            'NIK' => $row[1],
            'namaLengkap' => $row[2],
        ]);
    }
}
