<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\kematian;
use App\Models\penduduk;
use Illuminate\Http\Request;
use App\Imports\kematianImport;
use Maatwebsite\Excel\Facades\Excel;

class KematianController extends Controller
{
    public function index()
    {
        //
    }
    public function Kematian()
    {
        return view('kelola_data_masyarakat/kematian', [
            'kematian'  => kematian::all(),
            'title' => 'Data Kematian',
            'page'  => 'kematian'
        ]);
    }
    public function KematianInput()
    {
        return view('kelola_data_masyarakat/input', [
            'title' => 'Input Kematian',
            'page'  => 'Input Kematian'
        ]);
    }
    public function getDataByNIK($NIK_CARI)
    {
        $penduduk = penduduk::where('NIK', $NIK_CARI)->first();
        return response()->json($penduduk);
    }

    public function kirim(Request $request)
    { {
            $request->validate([
                'nik' => 'required|numeric',
                'namaLengkap' => 'required|numeric',
                'ttl' => 'required',
                'ttm' => 'required',
                'namaPelapor' => 'required',
                'nikPelapor' => 'required',
                'noDapatDihubungi' => 'required',
            ]);

            // Ambil data dari tabel kependudukan berdasarkan NIK
            $nik_pendudukan = penduduk::where('nik', $request->nik)->first();
            $nama_pendudukan = penduduk::where('nik', $request->nik)->first('namaLengkap');

            // Simpan data ke tabel kematian
            $kematian = new Kematian();
            $kematian->NIK = $nik_pendudukan->NIK;
            $kematian->namaLengkap = $nama_pendudukan->namaLengkap;
            $kematian->ttl = $request->ttl;
            $kematian->ttm = $request->ttm;
            $kematian->namaPelapor = $request->namaPelapor;
            $kematian->nikPelapor = $request->nikPelapor;
            $kematian->noDapatDihubungi = $request->noDapatDihubungi;
            // Tambahkan kolom-kolom lain sesuai kebutuhan
            $kematian->save();

            // Tampilkan pesan sukses atau redirect ke halaman tertentu
            return redirect('data/kematian')->with('berhasil', 'Berhasil menambahkan petugas!');
        }
    }

    public function importkematian(Request $request)
    {
        $data = $request->file('file');

        $namafile = $data->getClientOriginalName();
        $data->move('kematianData', $namafile);

        Excel::import(new kematianImport, \public_path('/kematiandata/' . $namafile));
        return \redirect()->back();
    }
    public function destroy(kematian $item, $id)
    {
        if (kematian::destroy($id)) {
            return redirect()->back()->with('berhasil', 'Berhasil menghapus pengguna!');
        } else {
            return redirect()->back()->with('gagal', 'Gagal menghapus pengguna!');
        }
    }
}
