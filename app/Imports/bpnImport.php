<?php

namespace App\Imports;

use App\Models\bpn;
use Maatwebsite\Excel\Concerns\ToModel;

class bpnImport implements ToModel
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        return new bpn([
            'NIK' => $row[1],
            'namaLengkap' => $row[2],
        ]);
    }
}
