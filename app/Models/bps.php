<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bps extends Model
{
    use HasFactory;
    protected $table = 'bantuanpanganstunting';

    // Kolom yang dapat diisi (fillable)
    protected $guarded = ['id'];
}
