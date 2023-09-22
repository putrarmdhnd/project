<?php

namespace App\Models\LandingPage;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pengumuman extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
