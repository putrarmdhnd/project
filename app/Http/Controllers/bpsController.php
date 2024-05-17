<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\bps;
use App\Models\penduduk;
use Illuminate\Http\Request;
use App\Imports\bpsImport;
use Maatwebsite\Excel\Facades\Excel;

class bpsController extends Controller
{
    public function bps()
    {
        return view('kelola_data_masyarakat/bps', [
            'bps'  => bps::all(),
            'title' => 'Data Bantuan Pangan Stunting',
            'page'  => 'bps'
        ]);
    }
    public function bpsInput()
    {
        return view('kelola_data_masyarakat/input', [
            'title' => 'Input bps',
            'page'  => 'Input bps'
        ]);
    }
    public function getDataByNIK($NIK_CARI)
    {
        $penduduk = penduduk::where('NIK', $NIK_CARI)->first();
        return response()->json($penduduk);
    }

    public function kirimbps(Request $request)
    { {
            $request->validate([
                'nik' => 'required|numeric',
                'namaLengkap' => 'required',
                'jk' => 'required',
                'tempatLahir' => 'required',
                'tanggalLahir' => 'required',
                'agama' => 'required',
                'namaAyah' => 'required',
                'namaIbu' => 'required',
                'namaKepalaKeluarga' => 'required',
                'alamat' => 'required',
                'rt' => 'required',
                'rw' => 'required',
                'kodePos' => 'required',
                'desa' => 'required',
                'kecamatan' => 'required',
                'kabupaten' => 'required',
                'provinsi' => 'required',
            ]);

            // Ambil data dari tabel kependudukan berdasarkan NIK
            $nik_pendudukan = penduduk::where('nik', $request->nik)->first();
            $nama_pendudukan = penduduk::where('nik', $request->nik)->first('namaLengkap');
            $jk_pendudukan = penduduk::where('nik', $request->nik)->first('jk');
            $tempat_pendudukan = penduduk::where('nik', $request->nik)->first('tempatLahir');
            $tanggal_pendudukan = penduduk::where('nik', $request->nik)->first('tanggalLahir');
            $agama_pendudukan = penduduk::where('nik', $request->nik)->first('agama');
            $ayah_pendudukan = penduduk::where('nik', $request->nik)->first('namaAyah');
            $ibu_pendudukan = penduduk::where('nik', $request->nik)->first('namaIbu');
            $kepalaKeluarga_pendudukan = penduduk::where('nik', $request->nik)->first('namaKepalaKeluarga');
            $alamat_pendudukan = penduduk::where('nik', $request->nik)->first('alamat');
            $rt_pendudukan = penduduk::where('nik', $request->nik)->first('rt');
            $rw_pendudukan = penduduk::where('nik', $request->nik)->first('rw');
            $kodePos_pendudukan = penduduk::where('nik', $request->nik)->first('kodePos');
            $desa_pendudukan = penduduk::where('nik', $request->nik)->first('desa');
            $kecamatan_pendudukan = penduduk::where('nik', $request->nik)->first('kecamatan');
            $kabupaten_pendudukan = penduduk::where('nik', $request->nik)->first('kabupaten');
            $provinsi_pendudukan = penduduk::where('nik', $request->nik)->first('provinsi');

            // Simpan data ke tabel kematian
            $bps = new bps();
            $bps->NIK = $nik_pendudukan->NIK;
            $bps->namaLengkap = $nama_pendudukan->namaLengkap;
            $bps->jk = $jk_pendudukan->jk;
            $bps->tempatLahir = $tempat_pendudukan->tempatLahir;
            $bps->tanggalLahir = $tanggal_pendudukan->tanggalLahir;
            $bps->agama = $agama_pendudukan->agama;
            $bps->namaAyah = $ayah_pendudukan->namaAyah;
            $bps->namaIbu = $ibu_pendudukan->namaIbu;
            $bps->namaKepalaKeluarga = $kepalaKeluarga_pendudukan->namaKepalaKeluarga;
            $bps->alamat = $alamat_pendudukan->alamat;
            $bps->rt = $rt_pendudukan->rt;
            $bps->rw = $rw_pendudukan->rw;
            $bps->kodePos = $kodePos_pendudukan->kodePos;
            $bps->desa = $desa_pendudukan->desa;
            $bps->kecamatan = $kecamatan_pendudukan->kecamatan;
            $bps->kabupaten = $kabupaten_pendudukan->kabupaten;
            $bps->provinsi = $provinsi_pendudukan->provinsi;
            // Tambahkan kolom-kolom lain sesuai kebutuhan
            $bps->save();

            // Tampilkan pesan sukses atau redirect ke halaman tertentu
            return redirect('data/bps')->with('berhasil', 'Berhasil menambahkan petugas!');
        }
    }

    public function importbps(Request $request)
    {
        $data = $request->file('file');

        $namafile = $data->getClientOriginalName();
        $data->move('bpsData', $namafile);

        Excel::import(new bpsImport, \public_path('/bpsdata/' . $namafile));
        return \redirect()->back();
    }
    public function destroy(bps $item, $id)
    {
        if (bps::destroy($id)) {
            return redirect()->back()->with('berhasil', 'Berhasil menghapus pengguna!');
        } else {
            return redirect()->back()->with('gagal', 'Gagal menghapus pengguna!');
        }
    }
}
