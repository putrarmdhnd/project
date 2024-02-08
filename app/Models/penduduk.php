<?php

// app\Models\Kependudukan.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class penduduk extends Model
{
    // Nama tabel dalam database
    protected $table = 'penduduks';

    // Kolom yang dapat diisi fillable
    protected $fillable = [
           'noKK',
           'namaLengkap',
           'NIK',
           'jk',
           'tempatLahir',
           'tanggalLahir',
           'agama',
           'pendidikan',
           'jenisPekerjaan',
           'goldar',
           'statusPerkawinan',
           'tanggalPerkawinan',
           'statusHubungan',
           'kewarganegaraan',
           'noPaspor',
           'noKitap',
           'namaAyah',
           'namaIbu',
           'namaKepalaKeluarga',
           'alamat',
           'rt',
           'rw',
           'kodePos',
           'desa',
           'kecamatan',
           'kabupaten',
           'provinsi',
           'tanggalDikeluarkan',
           'tipePenduduk',
           'statusNik',
    ];
}

