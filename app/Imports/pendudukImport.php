<?php

namespace App\Imports;

use App\Models\penduduk;
use Maatwebsite\Excel\Concerns\ToModel;

class pendudukImport implements ToModel
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        return new penduduk([
            'noKK' => $row[1],
            'namaLengkap' => $row[2],
            'NIK' => $row[3],
            'jk' => $row[4],
            'tempatLahir' => $row[5],
            'tanggalLahir' => $row[6],
            'agama' => $row[7],
            'pendidikan' => $row[8],
            'jenisPekerjaan' => $row[9],
            'goldar' => $row[10],
            'statusPerkawinan' => $row[11],
            'tanggalPerkawinan' => $row[12],
            'statusHubungan' => $row[13],
            'kewarganegaraan' => $row[14],
            'noPaspor' => $row[15],
            'noKitap' => $row[16],
            'namaAyah' => $row[17],
            'namaIbu' => $row[18],
            'namaKepalaKeluarga' => $row[19],
            'alamat' => $row[20],
            'rt' => $row[21],
            'rw' => $row[22],
            'kodePos' => $row[23],
            'desa' => $row[24],
            'kecamatan' => $row[25],
            'kabupaten' => $row[26],
            'provinsi' => $row[27],
            'tanggalDikeluarkan' => $row[28],
            'tipePenduduk' => $row[29],
            'statusNik' => $row[30],
        ]);
    }
}
