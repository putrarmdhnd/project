<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\miskin;
use App\Models\penduduk;
use Illuminate\Http\Request;
use App\Imports\masyarakatmiskinImport;
use Maatwebsite\Excel\Facades\Excel;

class MiskinController extends Controller
{
    public function Miskin()
    {
        return view('kelola_data_masyarakat/masyarakatmiskin', [
            'miskin'  => miskin::all(),
            'title' => 'Data masyakarat miskin',
            'page'  => 'masyarakatmiskin'
        ]);
    }
    public function masyarakatMiskinInput()
    {
        return view('kelola_data_masyarakat/input', [
            'title' => 'Input miskin',
            'page'  => 'Input miskin'
        ]);
    }
    public function getDataByNIK($NIK_CARI)
    {
        $penduduk = penduduk::where('NIK', $NIK_CARI)->first();
        return response()->json($penduduk);
    }

    public function kirimMasyarakatMiskin(Request $request)
    { {
            $request->validate([
                'nik' => 'required|numeric',
                'namaLengkap' => 'required|numeric',
            ]);

            // Ambil data dari tabel kependudukan berdasarkan NIK
            $nik_pendudukan = penduduk::where('nik', $request->nik)->first();
            $nama_pendudukan = penduduk::where('nik', $request->nik)->first('namaLengkap');

            // Simpan data ke tabel kematian
            $miskin = new miskin();
            $miskin->NIK = $nik_pendudukan->NIK;
            $miskin->namaLengkap = $nama_pendudukan->namaLengkap;
            // Tambahkan kolom-kolom lain sesuai kebutuhan
            $miskin->save();

            // Tampilkan pesan sukses atau redirect ke halaman tertentu
            return redirect('data/kematian')->with('berhasil', 'Berhasil menambahkan petugas!');
        }
    }

    public function importmiskin(Request $request)
    {
        $data = $request->file('file');

        $namafile = $data->getClientOriginalName();
        $data->move('miskinData', $namafile);

        Excel::import(new masyarakatmiskinImport, \public_path('/miskindata/' . $namafile));
        return \redirect()->back();
    }
    public function destroy(miskin $item, $id)
    {
        if (miskin::destroy($id)) {
            return redirect()->back()->with('berhasil', 'Berhasil menghapus pengguna!');
        } else {
            return redirect()->back()->with('gagal', 'Gagal menghapus pengguna!');
        }
    }
}
