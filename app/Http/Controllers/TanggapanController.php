<?php

namespace App\Http\Controllers;

use App\Models\Tanggapan;
use Illuminate\Http\Request;

class TanggapanController extends Controller {
    public function index() {
        return view('tanggapan/index', [
            'title' => 'Semua Tanggapan',
            'tanggapan' => Tanggapan::all()
        ]);
    }

    public function destroy(Tanggapan $tanggapan) {
        if(Tanggapan::destroy($tanggapan->id)) {
            return redirect('tanggapan')->with('berhasil', 'Berhasil menghapus tanggapan!');
        }else{
            return redirect('tanggapan')->with('gagal', 'Gagal menghapus tanggapan!');
        }
    }
}
