<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\bbp;
use App\Models\penduduk;
use Illuminate\Http\Request;
use App\Imports\bbpImport;
use Maatwebsite\Excel\Facades\Excel;


class bbpController extends Controller
{
    public function bbp()
    {
        return view('kelola_data_masyarakat/bbp', [
            'kelahiran'  => bbp::all(),
            'title' => 'Data masyakarat Bantuan Beras Pemerintah',
            'page'  => 'bbp'
        ]);
    }
    public function bbpInput()
    {
        return view('kelola_data_masyarakat/input', [
            'title' => 'Input bbp',
            'page'  => 'Input bbp'
        ]);
    }
    public function getDataByNIK($NIK_CARI)
    {
        $penduduk = penduduk::where('NIK', $NIK_CARI)->first();
        return response()->json($penduduk);
    }

    public function kirimbbp(Request $request)
    { {
            $request->validate([
                'nik' => 'required|numeric',
                'namaLengkap' => 'required|numeric',
            ]);

            // Ambil data dari tabel kependudukan berdasarkan NIK
            $nik_pendudukan = penduduk::where('nik', $request->nik)->first();
            $nama_pendudukan = penduduk::where('nik', $request->nik)->first('namaLengkap');

            // Simpan data ke tabel kematian
            $bbp = new bbp();
            $bbp->NIK = $nik_pendudukan->NIK;
            $bbp->namaLengkap = $nama_pendudukan->namaLengkap;
            // Tambahkan kolom-kolom lain sesuai kebutuhan
            $bbp->save();

            // Tampilkan pesan sukses atau redirect ke halaman tertentu
            return redirect('data/bbp')->with('berhasil', 'Berhasil menambahkan petugas!');
        }
    }

    public function importbbp(Request $request)
    {
        $data = $request->file('file');

        $namafile = $data->getClientOriginalName();
        $data->move('bbpData', $namafile);

        Excel::import(new bbpImport, \public_path('/bbpdata/' . $namafile));
        return \redirect()->back();
    }
    public function destroy(bbp $item, $id)
    {
        if (bbp::destroy($id)) {
            return redirect()->back()->with('berhasil', 'Berhasil menghapus pengguna!');
        } else {
            return redirect()->back()->with('gagal', 'Gagal menghapus pengguna!');
        }
    }
}
