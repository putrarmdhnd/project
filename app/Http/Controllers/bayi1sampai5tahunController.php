<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\bayi1sampai5tahun;
use App\Models\penduduk;
use Illuminate\Http\Request;
use App\Imports\bayi1sampai5tahunImport;
use Maatwebsite\Excel\Facades\Excel;

class bayi1sampai5tahunController extends Controller
{
    public function bayi1sampai5tahun()
    {
        return view('kelola_data_masyarakat/bayi1sampai5tahun', [
            'bayi1sampai5tahun'  => bayi1sampai5tahun::all(),
            'title' => 'Data bayi 1 sampai 5 tahun',
            'page'  => 'bayi1sampai5tahun'
        ]);
    }
    public function bayi1sampai5tahunInput()
    {
        return view('kelola_data_masyarakat/input', [
            'title' => 'Input bayi',
            'page'  => 'Input bayi'
        ]);
    }
    public function getDataByNIK($NIK_CARI)
    {
        $penduduk = penduduk::where('NIK', $NIK_CARI)->first();
        return response()->json($penduduk);
    }

    public function kirimbayi1sampai5tahun(Request $request)
    { {
            $request->validate([
                'nik' => 'required|numeric',
                'namaLengkap' => 'required|numeric',
            ]);

            // Ambil data dari tabel kependudukan berdasarkan NIK
            $nik_pendudukan = penduduk::where('nik', $request->nik)->first();
            $nama_pendudukan = penduduk::where('nik', $request->nik)->first('namaLengkap');

            // Simpan data ke tabel kematian
            $bayi1sampai5tahun = new bayi1sampai5tahun();
            $bayi1sampai5tahun->NIK = $nik_pendudukan->NIK;
            $bayi1sampai5tahun->namaLengkap = $nama_pendudukan->namaLengkap;
            // Tambahkan kolom-kolom lain sesuai kebutuhan
            $bayi1sampai5tahun->save();

            // Tampilkan pesan sukses atau redirect ke halaman tertentu
            return redirect('data/bayi1sampai5tahun')->with('berhasil', 'Berhasil menambahkan petugas!');
        }
    }

    public function importbayi1sampai5tahun(Request $request)
    {
        $data = $request->file('file');

        $namafile = $data->getClientOriginalName();
        $data->move('bayi1sampai5tahunData', $namafile);

        Excel::import(new bayi1sampai5tahunImport, \public_path('/bayi1sampai5tahundata/' . $namafile));
        return \redirect()->back();
    }
    public function destroy(bayi1sampai5tahun $item, $id)
    {
        if (bayi1sampai5tahun::destroy($id)) {
            return redirect()->back()->with('berhasil', 'Berhasil menghapus pengguna!');
        } else {
            return redirect()->back()->with('gagal', 'Gagal menghapus pengguna!');
        }
    }
}
