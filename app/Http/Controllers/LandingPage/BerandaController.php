<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use App\Models\LandingPage\ApbDesa;
use App\Models\LandingPage\Berita;

class BerandaController extends Controller
{
    public function index()
    {
        $apb = ApbDesa::all();
        $beritas = Berita::all();
        return view('landing_page.beranda.index', compact('apb','beritas'));
    }
}
