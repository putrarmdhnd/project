<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\bpn;
use App\Models\penduduk;
use Illuminate\Http\Request;
use App\Imports\bpnImport;
use Maatwebsite\Excel\Facades\Excel;

class bpnController extends Controller
{
    public function bpn()
    {
        return view('kelola_data_masyarakat/bpn', [
            'kelahiran'  => bpn::all(),
            'title' => 'Data masyakarat Bantuan Pangan Non Tunai',
            'page'  => 'bpn'
        ]);
    }
    public function bpnInput()
    {
        return view('kelola_data_masyarakat/input', [
            'title' => 'Input bpn',
            'page'  => 'Input bpn'
        ]);
    }
    public function getDataByNIK($NIK_CARI)
    {
        $penduduk = penduduk::where('NIK', $NIK_CARI)->first();
        return response()->json($penduduk);
    }

    public function kirimbpn(Request $request)
    { {
            $request->validate([
                'nik' => 'required|numeric',
                'namaLengkap' => 'required|numeric',
            ]);

            // Ambil data dari tabel kependudukan berdasarkan NIK
            $nik_pendudukan = penduduk::where('nik', $request->nik)->first();
            $nama_pendudukan = penduduk::where('nik', $request->nik)->first('namaLengkap');

            // Simpan data ke tabel kematian
            $bpn = new bpn();
            $bpn->NIK = $nik_pendudukan->NIK;
            $bpn->namaLengkap = $nama_pendudukan->namaLengkap;
            // Tambahkan kolom-kolom lain sesuai kebutuhan
            $bpn->save();

            // Tampilkan pesan sukses atau redirect ke halaman tertentu
            return redirect('data/kematian')->with('berhasil', 'Berhasil menambahkan petugas!');
        }
    }

    public function importbpn(Request $request)
    {
        $data = $request->file('file');

        $namafile = $data->getClientOriginalName();
        $data->move('bpnData', $namafile);

        Excel::import(new bpnImport, \public_path('/bpndata/' . $namafile));
        return \redirect()->back();
    }
    public function destroy(bpn $item, $id)
    {
        if (bpn::destroy($id)) {
            return redirect()->back()->with('berhasil', 'Berhasil menghapus pengguna!');
        } else {
            return redirect()->back()->with('gagal', 'Gagal menghapus pengguna!');
        }
    }
}
