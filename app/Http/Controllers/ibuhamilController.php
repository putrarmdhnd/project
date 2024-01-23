<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ibuhamil;
use App\Models\penduduk;
use Illuminate\Http\Request;
use App\Imports\ibuhamilImport;
use Maatwebsite\Excel\Facades\Excel;
class ibuhamilController extends Controller
{
    public function Ibuhamil()
    {
        return view('kelola_data_masyarakat/ibuhamil', [
            'ibuhamil'  => ibuhamil::all(),
            'title' => 'Ibu Hamil',
            'page'  => 'ibuhamil'
        ]);
    }
    public function ibuHamilInput()
    {
        return view('kelola_data_masyarakat/input', [
            'title' => 'Input ibu_hamil',
            'page'  => 'Input ibu_hamil'
        ]);
    }
    public function getDataByNIK($NIK_CARI)
    {
        $penduduk = penduduk::where('NIK', $NIK_CARI)->first();
        return response()->json($penduduk);
    }

    public function kirimIbuHamil(Request $request)
    { {
            $request->validate([
                'nik' => 'required|numeric',
                'namaLengkap' => 'required|numeric',
            ]);

            // Ambil data dari tabel kependudukan berdasarkan NIK
            $nik_pendudukan = penduduk::where('nik', $request->nik)->first();
            $nama_pendudukan = penduduk::where('nik', $request->nik)->first('namaLengkap');

            // Simpan data ke tabel kematian
            $ibuhamil = new ibuhamil();
            $ibuhamil->NIK = $nik_pendudukan->NIK;
            $ibuhamil->namaLengkap = $nama_pendudukan->namaLengkap;
            // Tambahkan kolom-kolom lain sesuai kebutuhan
            $ibuhamil->save();

            // Tampilkan pesan sukses atau redirect ke halaman tertentu
            return redirect('data/ibuhamil')->with('berhasil', 'Berhasil menambahkan petugas!');
        }
    }

    public function importibuhamil(Request $request)
    {
        $data = $request->file('file');

        $namafile = $data->getClientOriginalName();
        $data->move('ibuhamilData', $namafile);

        Excel::import(new ibuhamilImport, \public_path('/ibuhamilData/' . $namafile));
        return \redirect()->back();
    }
    public function destroy(ibuhamil $item, $id)
    {
        if (ibuhamil::destroy($id)) {
            return redirect()->back()->with('berhasil', 'Berhasil menghapus pengguna!');
        } else {
            return redirect()->back()->with('gagal', 'Gagal menghapus pengguna!');
        }
    }
    
}
