<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use App\Models\LandingPage\LembagaDesa;

class LembagaDesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lembagas = LembagaDesa::all();
        return view('landing_page.pemerintah.lembaga_desa.index', compact('lembagas'));
    }

    public function show(LembagaDesa $lembaga){
        return view('landing_page.pemerintah.lembaga_desa.detail', compact('lembaga'));
    }
}
