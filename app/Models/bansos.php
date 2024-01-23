<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bansos extends Model
{
    use HasFactory;
    protected $table = 'bantuansosial';

    // Kolom yang dapat diisi (fillable)
    protected $guarded = ['id'];
}
