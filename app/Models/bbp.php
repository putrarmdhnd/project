<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bbp extends Model
{
    use HasFactory;
    protected $table = 'bantuanberaspemerintah';

    // Kolom yang dapat diisi (fillable)
    protected $guarded = ['id'];
}
