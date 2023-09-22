<?php

namespace App\Http\Controllers\LandingPage\CMS;

use App\Http\Controllers\Controller;
use App\Models\LandingPage\ApbDesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class APBDesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apb_desas = ApbDesa::all();
        return view('landing_page.cms.apb_desa.index', compact('apb_desas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('landing_page.cms.apb_desa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'tahun' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
        ]);

        // loop $request->all() if value is array convert to json
        $data = [];
        foreach ($request->all() as $key => $value) {
            if (is_array($value)) {
                $data[$key] = json_encode($value);
            } else {
                $data[$key] = $value;
            }
        }

        if ($request->hasFile('gambar')) {
            $data['gambar'] = 'storage/' . $request->file('gambar')->store('public/apb_desa', 'public');
        }

        ApbDesa::create($data);

        return redirect()->route('cms.apb.index')->with('success', 'APB Desa berhasil ditambah');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LandingPage\ApbDesa  $apbDesa
     * @return \Illuminate\Http\Response
     */
    public function edit(ApbDesa $apb)
    {
        return view('landing_page.cms.apb_desa.edit', compact('apb'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LandingPage\ApbDesa  $apbDesa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ApbDesa $apb)
    {
        $request->validate([
            'judul' => 'required',
            'tahun' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
        ]);

        // loop $request->all() if value is array convert to json
        $data = [];
        foreach ($request->all() as $key => $value) {
            if (is_array($value)) {
                $data[$key] = json_encode($value);
            } else {
                $data[$key] = $value;
            }
        }

        if ($request->hasFile('gambar')) {
            $data['gambar'] = 'storage/' . $request->file('gambar')->store('public/apb_desa', 'public');

            if ($apb->gambar) {
                Storage::delete(substr($apb->gambar, 8));
            }
        }

        $apb->update($data);

        return redirect()->route('cms.apb.index')->with('success', 'APB Desa berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LandingPage\ApbDesa  $apbDesa
     * @return \Illuminate\Http\Response
     */
    public function destroy(ApbDesa $apb)
    {
        if ($apb->gambar) {
            Storage::delete(substr($apb->gambar, 8));
        }

        $apb->delete();

        return redirect()->route('cms.apb.index')->with('success', 'APB Desa berhasil dihapus');
    }
}
