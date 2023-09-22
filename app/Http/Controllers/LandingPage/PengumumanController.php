<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use App\Models\LandingPage\Pengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    public function index(Request $request){
        if ($request->search) {
            $pengumumans = Pengumuman::with('author')->where('judul', 'like', '%' . $request->search . '%')->orWhere('deskripsi', 'like', '%' . $request->search . '%')->paginate(6);
        } else {
            $pengumumans = Pengumuman::with('author')->paginate(6);
        }

        $pengumuman_terbaru = Pengumuman::with('author')->orderBy('created_at', 'desc')->limit(3)->get();

        return view('landing_page.informasi.pengumuman.index', compact('pengumumans', 'pengumuman_terbaru'));
    }

    public function show($slug){
        $pengumuman = Pengumuman::with('author')->where('slug', $slug)->first();
        return view('landing_page.informasi.pengumuman.detail',compact('pengumuman'));
    }
}
