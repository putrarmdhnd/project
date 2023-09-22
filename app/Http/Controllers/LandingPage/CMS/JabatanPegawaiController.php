<?php

namespace App\Http\Controllers\LandingPage\CMS;

use App\Http\Controllers\Controller;
use App\Models\LandingPage\JabatanPegawai;
use App\Services\JabatanService;
use Illuminate\Http\Request;

class JabatanPegawaiController extends Controller
{

    public function __construct(JabatanService $jabatanService)
    {
        $this->jabatanService = $jabatanService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jabatans = JabatanPegawai::all();
        return view('landing_page.cms.master_data.jabatan.index', compact('jabatans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->jabatanService->storeJabatan($request);
        return redirect()->route('cms.jabatan.index')->with('success', 'Jabatan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LandingPage\JabatanPegawai  $jabatanPegawai
     * @return \Illuminate\Http\Response
     */
    public function show(JabatanPegawai $jabatanPegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LandingPage\JabatanPegawai  $jabatanPegawai
     * @return \Illuminate\Http\Response
     */
    public function edit(JabatanPegawai $jabatan)
    {
        return view('landing_page.cms.master_data.jabatan.edit', compact('jabatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LandingPage\JabatanPegawai  $jabatanPegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JabatanPegawai $jabatan)
    {
        $this->jabatanService->updateJabatan($request, $jabatan);
        return redirect()->route('cms.jabatan.index')->with('success', 'Jabatan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LandingPage\JabatanPegawai  $jabatanPegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy(JabatanPegawai $jabatan)
    {
        $jabatan->delete();
        return redirect()->route('cms.jabatan.index')->with('success', 'Jabatan berhasil dihapus');
    }
}
