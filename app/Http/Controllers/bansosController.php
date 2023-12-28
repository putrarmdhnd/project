<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\bansos;
use App\Models\penduduk;
use Illuminate\Http\Request;
use App\Imports\bansosImport;
use Maatwebsite\Excel\Facades\Excel;

class bansosController extends Controller
{
    public function bansos()
    {
        return view('kelola_data_masyarakat/bansos', [
            'kelahiran'  => bansos::all(),
            'title' => 'Data masyakarat Bantuan Sosial',
            'page'  => 'bansos'
        ]);
    }
    public function bansosInput()
    {
        return view('kelola_data_masyarakat/input', [
            'title' => 'Input bansos',
            'page'  => 'Input bansos'
        ]);
    }
    public function getDataByNIK($NIK_CARI)
    {
        $penduduk = penduduk::where('NIK', $NIK_CARI)->first();
        return response()->json($penduduk);
    }

    public function kirimbansos(Request $request)
    { {
            $request->validate([
                'nik' => 'required|numeric',
                'namaLengkap' => 'required|numeric',
            ]);

            // Ambil data dari tabel kependudukan berdasarkan NIK
            $nik_pendudukan = penduduk::where('nik', $request->nik)->first();
            $nama_pendudukan = penduduk::where('nik', $request->nik)->first('namaLengkap');

            // Simpan data ke tabel kematian
            $bansos = new bansos();
            $bansos->NIK = $nik_pendudukan->NIK;
            $bansos->namaLengkap = $nama_pendudukan->namaLengkap;
            // Tambahkan kolom-kolom lain sesuai kebutuhan
            $bansos->save();

            // Tampilkan pesan sukses atau redirect ke halaman tertentu
            return redirect('data/bansos')->with('berhasil', 'Berhasil menambahkan petugas!');
        }
    }

    public function importbansos(Request $request)
    {
        $data = $request->file('file');

        $namafile = $data->getClientOriginalName();
        $data->move('bansosData', $namafile);

        Excel::import(new bansosImport, \public_path('/bansosdata/' . $namafile));
        return \redirect()->back();
    }
    public function destroy(bansos $item, $id)
    {
        if (bansos::destroy($id)) {
            return redirect()->back()->with('berhasil', 'Berhasil menghapus pengguna!');
        } else {
            return redirect()->back()->with('gagal', 'Gagal menghapus pengguna!');
        }
    }
}
