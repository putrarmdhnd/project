<?php

namespace App\Http\Controllers\LandingPage\CMS;

use App\Http\Controllers\Controller;
use App\Models\LandingPage\LembagaDesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        return view('landing_page.cms.lembaga_desa.index', compact('lembagas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('landing_page.cms.lembaga_desa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $request->validate([
            'nama_lembaga' => 'required',
            'singkatan' => 'required',
            'logo' => 'image|mimes:jpeg,png,jpg',
            'alamat_kantor' => 'required',
        ]);

        if ($request->hasFile('logo')) {
            $data['logo'] = 'storage/' . $request->file('logo')->store('public/lembaga', 'public');
        }

        LembagaDesa::create($data);

        return redirect()->route('cms.lembaga-desa.index')->with('success', 'Lembaga Desa berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LandingPage\LembagaDesa  $lembagaDesa
     * @return \Illuminate\Http\Response
     */
    public function show(LembagaDesa $lembagaDesa)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LandingPage\LembagaDesa  $lembagaDesa
     * @return \Illuminate\Http\Response
     */
    public function edit(LembagaDesa $lembagaDesa)
    {
        return view('landing_page.cms.lembaga_desa.edit', compact('lembagaDesa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LandingPage\LembagaDesa  $lembagaDesa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LembagaDesa $lembagaDesa)
    {
        $data = $request->all();

        $request->validate([
            'nama_lembaga' => 'required',
            'singkatan' => 'required',
            'logo' => 'image|mimes:jpeg,png,jpg',
            'alamat_kantor' => 'required',
        ]);

        if ($request->hasFile('logo')) {
            $data['logo'] = 'storage/' . $request->file('logo')->store('public/lembaga', 'public');

            if ($lembagaDesa->logo) {
                Storage::delete(substr($lembagaDesa->logo, 8));
            }
        } else {
            $data['logo'] = $lembagaDesa->logo;
        }

        $lembagaDesa->update($data);

        return redirect()->route('cms.lembaga-desa.index')->with('success', 'Lembaga Desa berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LandingPage\LembagaDesa  $lembagaDesa
     * @return \Illuminate\Http\Response
     */
    public function destroy(LembagaDesa $lembagaDesa)
    {
        if ($lembagaDesa->logo) {
            Storage::delete(substr($lembagaDesa->logo, 8));
        }

        $lembagaDesa->delete();

        return redirect()->route('cms.lembaga-desa.index')->with('success', 'Lembaga Desa berhasil diubah');
    }
}
