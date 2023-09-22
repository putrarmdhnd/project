<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use App\Models\LandingPage\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function index()
    {
        $galeries = Galeri::all();

        return view('landing_page.informasi.galeri.index', compact('galeries'));
    }
}
