<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use App\Models\LandingPage\ApbDesa;

class APBDesaController extends Controller
{
    public function index()
    {
        $apb = ApbDesa::paginate(6);
        $apb_terbaru = ApbDesa::orderBy('created_at', 'desc')->limit(3)->get();
        return view('landing_page.informasi.APBDesa.index', compact('apb', 'apb_terbaru'));
    }

    public function show(ApbDesa $apb)
    {
        return view('landing_page.informasi.APBDesa.detail', compact('apb'));
    }
}
