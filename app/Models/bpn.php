<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bpn extends Model
{
    use HasFactory;
    protected $table = 'bantuanpangannontunai';

    // Kolom yang dapat diisi (fillable)
    protected $guarded = ['id'];
}
