<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\anakyatim;
use App\Models\penduduk;
use Illuminate\Http\Request;
use App\Imports\anakyatimImport;
use Maatwebsite\Excel\Facades\Excel;

class anakyatimController extends Controller
{
    public function anakyatim()
    {
        return view('kelola_data_masyarakat/anakyatim', [
            'anakyatim'  => anakyatim::all(),
            'title' => 'Data masyakarat Anak Yatim 1 Sampai 12 Tahun',
            'page'  => 'anakyatim'
        ]);
    }
    public function anakyatimInput()
    {
        return view('kelola_data_masyarakat/input', [
            'title' => 'Input yatim',
            'page'  => 'Input yatim'
        ]);
    }
    public function getDataByNIK($NIK_CARI)
    {
        $penduduk = penduduk::where('NIK', $NIK_CARI)->first();
        return response()->json($penduduk);
    }

    public function kirimanakyatim(Request $request)
    { {
            $request->validate([
                'nik' => 'required|numeric',
                'namaLengkap' => 'required|numeric',
            ]);

            // Ambil data dari tabel kependudukan berdasarkan NIK
            $nik_pendudukan = penduduk::where('nik', $request->nik)->first();
            $nama_pendudukan = penduduk::where('nik', $request->nik)->first('namaLengkap');

            // Simpan data ke tabel kematian
            $anakyatim = new anakyatim();
            $anakyatim->NIK = $nik_pendudukan->NIK;
            $anakyatim->namaLengkap = $nama_pendudukan->namaLengkap;
            // Tambahkan kolom-kolom lain sesuai kebutuhan
            $anakyatim->save();

            // Tampilkan pesan sukses atau redirect ke halaman tertentu
            return redirect('data/anakyatim')->with('berhasil', 'Berhasil menambahkan petugas!');
        }
    }

    public function importanakyatim(Request $request)
    {
        $data = $request->file('file');

        $namafile = $data->getClientOriginalName();
        $data->move('anakyatimData', $namafile);

        Excel::import(new anakyatimImport, \public_path('/anakyatimdata/' . $namafile));
        return \redirect()->back();
    }
    public function destroy(anakyatim $item, $id)
    {
        if (anakyatim::destroy($id)) {
            return redirect()->back()->with('berhasil', 'Berhasil menghapus pengguna!');
        } else {
            return redirect()->back()->with('gagal', 'Gagal menghapus pengguna!');
        }
    }
}
