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
            'kelahiran'  => bps::all(),
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
                'namaLengkap' => 'required|numeric',
            ]);

            // Ambil data dari tabel kependudukan berdasarkan NIK
            $nik_pendudukan = penduduk::where('nik', $request->nik)->first();
            $nama_pendudukan = penduduk::where('nik', $request->nik)->first('namaLengkap');

            // Simpan data ke tabel kematian
            $bps = new bps();
            $bps->NIK = $nik_pendudukan->NIK;
            $bps->namaLengkap = $nama_pendudukan->namaLengkap;
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
