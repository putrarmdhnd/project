<?php

namespace App\Models\LandingPage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pegawai extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function jabatan_pegawai()
    {
        return $this->belongsTo(JabatanPegawai::class)->withDefault([
            'nama' => 'Anggota',
        ]);
    }
}
