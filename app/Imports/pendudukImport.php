<?php

namespace App\Imports;

use App\Models\penduduk;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class pendudukImport implements WithHeadingRow, ToModel
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        return new penduduk([
            'noKK' => $row['nomor_kk'],
            'namaLengkap' => $row['nama_lengkap'],
            'NIK' => $row['nik'],
            'jk' => $row['jenis_kelamin'],
            'tempatLahir' => $row['tempat_lahir'],
            'tanggalLahir' => $row['tanggal_lahir'],
            'agama' => $row['agama'],
            'pendidikan' => $row['pendidikan'],
            'jenisPekerjaan' => $row['jenis_pekerjaan'],
            'goldar' => $row['golongan_darah'],
            'statusPerkawinan' => $row['status_perkawinan'],
            'tanggalPerkawinan' => $row['tanggal_perkawinan'],
            'statusHubungan' => $row['status_hubungan'],
            'kewarganegaraan' => $row['kewarganegaraan'],
            'noPaspor' => $row['nomor_paspor'],
            'noKitap' => $row['nomor_kitap'],
            'namaAyah' => $row['nama_ayah'],
            'namaIbu' => $row['nama_ibu'],
            'namaKepalaKeluarga' => $row['nama_kepala_keluarga'],
            'alamat' => $row['alamat'],
            'rt' => $row['rt'],
            'rw' => $row['rw'],
            'kodePos' => $row['kode_pos'],
            'desa' => $row['desa'],
            'kecamatan' => $row['kecamatan'],
            'kabupaten' => $row['kabupaten'],
            'provinsi' => $row['provinsi'],
            'tanggalDikeluarkan' => $row['tanggal_dikeluarkan'],
            'tipePenduduk' => $row['tipe_penduduk'],
            'statusNik' => $row['status_nik'],
        ]);
    }
}
