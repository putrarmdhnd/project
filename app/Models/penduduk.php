<?php

// app\Models\Kependudukan.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class penduduk extends Model
{
    // Nama tabel dalam database
    protected $table = 'penduduks';

    // Kolom yang dapat diisi (fillable)
    protected $guarded = ['id'];

}

