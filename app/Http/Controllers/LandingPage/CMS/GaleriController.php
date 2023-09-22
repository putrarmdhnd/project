<?php

namespace App\Http\Controllers\LandingPage\CMS;

use App\Http\Controllers\Controller;
use App\Models\LandingPage\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galeris = Galeri::all();
        return view('landing_page.cms.galeri.index', compact('galeris'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('landing_page.cms.galeri.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'judul' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048'
        ]);

        if ($request->hasFile('gambar')) {
            $validation['gambar'] = 'storage/' . $request->file('gambar')->store('public/galeri', 'public');
        }
        

        Galeri::create($validation);

        return redirect()->route('cms.galeri.index')->with('success', 'Galeri berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Galeri $galeri)
    {
        return view('landing_page.cms.galeri.edit', compact('galeri'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Galeri $galeri)
    {
        $validation = $request->validate([
            'judul' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048'
        ]);

        if ($request->hasFile('gambar')) {
            $validation['gambar'] = 'storage/' . $request->file('gambar')->store('public/galeri', 'public');

            Storage::delete(substr($galeri->gambar, 8));
        }

        $galeri->update($validation);

        return redirect()->route('cms.galeri.index')->with('success', 'Galeri berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Galeri $galeri)
    {
        Storage::delete(substr($galeri->gambar, 8));

        $galeri->delete();
        return redirect()->route('cms.galeri.index')->with('success', 'Galeri berhasil dihapus');
    }
}
