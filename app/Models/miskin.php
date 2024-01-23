<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class miskin extends Model
{
    use HasFactory;
    protected $table = 'masyarakat_miskin';

    // Kolom yang dapat diisi (fillable)
    protected $guarded = ['id'];
}
