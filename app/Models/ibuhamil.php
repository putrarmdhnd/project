<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ibuhamil extends Model
{
    use HasFactory;
    protected $table = 'ibu_hamils';

    // Kolom yang dapat diisi (fillable)
    protected $guarded = ['id'];
}
