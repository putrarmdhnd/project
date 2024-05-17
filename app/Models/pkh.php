<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pkh extends Model
{
    use HasFactory;
    protected $table = 'programkeluargaharapan';

    // Kolom yang dapat diisi (fillable)
    protected $fillable = [
        'NIK',
        'namaLengkap',
        'jk',
        'tempatLahir',
        'tanggalLahir',
        'agama',
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
    ];
}
