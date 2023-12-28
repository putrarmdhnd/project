<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class anakyatim extends Model
{
    use HasFactory;
    protected $table = 'anakyatim1sampai12tahun';

    // Kolom yang dapat diisi (fillable)
    protected $guarded = ['id'];
}
