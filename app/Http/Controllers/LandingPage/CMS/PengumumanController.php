<?php

namespace App\Http\Controllers\LandingPage\CMS;

use App\Http\Controllers\Controller;
use App\Models\LandingPage\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengumumans = Pengumuman::with('author')->get();
        return view('landing_page.cms.pengumuman.index', compact('pengumumans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('landing_page.cms.pengumuman.create');
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
            'judul' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
        ]);

        $data['judul_singkat'] = Str::limit(strip_tags($request->judul), 50);
        $data['deskripsi_singkat'] = Str::limit(strip_tags($request->deskripsi), 200);
        $data['author_id'] = auth()->user()->id;

        // check if slug is ready add unique number behind slug
        $data['slug'] = Str::slug($data['judul'], '-');

        if (Pengumuman::where('slug', $data['slug'])->first()) {
            $data['slug'] = $data['slug'] . '-' . time();
        }

        if ($request->hasFile('gambar')) {
            $data['gambar'] = 'storage/' . $request->file('gambar')->store('public/pengumuman/thumbnail', 'public');
        }

        Pengumuman::create($data);

        return redirect()->route('cms.pengumuman.index')->with('success', 'Pengumuman berhasil ditambah');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengumuman $pengumuman)
    {
        return view('landing_page.cms.pengumuman.edit', compact('pengumuman'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengumuman $pengumuman)
    {
        $data = $request->all();

        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
        ]);

        $data['judul_singkat'] = Str::limit(strip_tags($request->judul), 50);
        $data['slug'] = Str::slug($data['judul'], '-');
        $data['deskripsi_singkat'] = Str::limit(strip_tags($request->deskripsi), 200);
        $data['author_id'] = auth()->user()->id;

        if ($request->hasFile('gambar')) {
            $data['gambar'] = 'storage/' . $request->file('gambar')->store('public/pengumuman/thumbnail', 'public');
            Storage::delete(substr($pengumuman->gambar, 8));
        }

        $pengumuman->update($data);

        return redirect()->route('cms.pengumuman.index')->with('success', 'Pengumuman berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengumuman $pengumuman)
    {
        if ($pengumuman->gambar) {
            Storage::delete(substr($pengumuman->gambar, 8));
        }

        $pengumuman->delete();

        return redirect()->route('cms.pengumuman.index')->with('success', 'Pengumuman berhasil dihapus');
    }
}
