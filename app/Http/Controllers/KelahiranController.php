<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\kelahiran;
use App\Models\penduduk;
use Illuminate\Http\Request;
use App\Imports\kelahiranImport;
use Maatwebsite\Excel\Facades\Excel;

class KelahiranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Kelahiran()
    {
        return view('kelola_data_masyarakat/kelahiran', [
            'kelahiran'  => kelahiran::all(),
            'title' => 'Data Kelahiran',
            'page'  => 'kelahiran'
        ]);
    }
    public function KematianInput()
    {
        return view('kelola_data_masyarakat/input', [
            'title' => 'Input Kelahiran',
            'page'  => 'Input Kelahiran'
        ]);
    }

    public function getDataByNIK($NIK_CARI)
    {
        $penduduk = penduduk::where('NIK', $NIK_CARI)->first();
        return response()->json($penduduk);
    }

    public function kirimKelahiran(Request $request)
    { {
            $request->validate([
                'nik' => 'required|numeric',
                'namaLengkap' => 'required|numeric',
            ]);

            // Ambil data dari tabel kependudukan berdasarkan NIK
            $nik_pendudukan = penduduk::where('nik', $request->nik)->first();
            $nama_pendudukan = penduduk::where('nik', $request->nik)->first('namaLengkap');

            // Simpan data ke tabel kematian
            $kelahiran = new kelahiran();
            $kelahiran->NIK = $nik_pendudukan->NIK;
            $kelahiran->namaLengkap = $nama_pendudukan->namaLengkap;
            // Tambahkan kolom-kolom lain sesuai kebutuhan
            $kelahiran->save();

            // Tampilkan pesan sukses atau redirect ke halaman tertentu
            return redirect('data/kelahiran')->with('berhasil', 'Berhasil menambahkan petugas!');
        }
    }

    public function importkelahiran(Request $request)
    {
        $data = $request->file('file');

        $namafile = $data->getClientOriginalName();
        $data->move('kelahiranData', $namafile);

        Excel::import(new KelahiranImport, \public_path('/kelahirandata/' . $namafile));
        return \redirect()->back();
    }
    public function destroy(kelahiran $item, $id)
    {
        if (kelahiran::destroy($id)) {
            return redirect()->back()->with('berhasil', 'Berhasil menghapus pengguna!');
        } else {
            return redirect()->back()->with('gagal', 'Gagal menghapus pengguna!');
        }
    }
}
