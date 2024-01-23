<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\pkh;
use App\Models\penduduk;
use Illuminate\Http\Request;
use App\Imports\pkhImport;
use Maatwebsite\Excel\Facades\Excel;

class pkhController extends Controller
{
    public function pkh()
    {
        return view('kelola_data_masyarakat/pkh', [
            'pkh'  => pkh::all(),
            'title' => 'Data program keluarga harapan',
            'page'  => 'pkh'
        ]);
    }
    public function pkhInput()
    {
        return view('kelola_data_masyarakat/input', [
            'title' => 'Input pkh',
            'page'  => 'Input pkh'
        ]);
    }
    public function getDataByNIK($NIK_CARI)
    {
        $penduduk = penduduk::where('NIK', $NIK_CARI)->first();
        return response()->json($penduduk);
    }

    public function kirimpkh(Request $request)
    { {
            $request->validate([
                'nik' => 'required|numeric',
                'namaLengkap' => 'required|numeric',
            ]);

            // Ambil data dari tabel kependudukan berdasarkan NIK
            $nik_pendudukan = penduduk::where('nik', $request->nik)->first();
            $nama_pendudukan = penduduk::where('nik', $request->nik)->first('namaLengkap');

            // Simpan data ke tabel kematian
            $pkh = new pkh();
            $pkh->NIK = $nik_pendudukan->NIK;
            $pkh->namaLengkap = $nama_pendudukan->namaLengkap;
            // Tambahkan kolom-kolom lain sesuai kebutuhan
            $pkh->save();

            // Tampilkan pesan sukses atau redirect ke halaman tertentu
            return redirect('data/pkh')->with('berhasil', 'Berhasil menambahkan petugas!');
        }
    }

    public function importpkh(Request $request)
    {
        $data = $request->file('file');

        $namafile = $data->getClientOriginalName();
        $data->move('pkhData', $namafile);

        Excel::import(new pkhImport, \public_path('/pkhdata/' . $namafile));
        return \redirect()->back();
    }
    public function destroy(pkh $item, $id)
    {
        if (pkh::destroy($id)) {
            return redirect()->back()->with('berhasil', 'Berhasil menghapus pengguna!');
        } else {
            return redirect()->back()->with('gagal', 'Gagal menghapus pengguna!');
        }
    }
}
