<?php

namespace App\Imports;

use App\Models\miskin;
use Maatwebsite\Excel\Concerns\ToModel;

class masyarakatmiskinImport implements ToModel
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        return new miskin([
            'NIK' => $row[1],
            'namaLengkap' => $row[2],
        ]);
    }
}
