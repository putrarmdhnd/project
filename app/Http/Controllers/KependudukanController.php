<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\penduduk;
use App\Imports\pendudukImport;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel; // Tambahkan use statement untuk model Kependudukan

class KependudukanController extends Controller
{
    public function index() {
        $penduduk = penduduk::all();
        return view('data.kependudukan', compact('penduduk'));
    }

    public function Kependudukan() {
    
        return view('kelola_data_masyarakat.kependudukan', [
            'penduduk'  => penduduk::paginate(25), // Sesuaikan nama variabel dengan yang Anda gunakan di tampilan
            'title' => 'Data Kependudukan',
            'page'  => 'kependudukan'
            //'users' => User::where('level', 'masyarakat')->get()
        ]);
    }
    

    public function input() {
        return view('kelola_data_masyarakat/input', [
            'title' => 'Input Kependudukan',
            'page'  => 'input',
            //'users' => User::where('level', 'masyarakat')->get()
        ]);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'noKK' => 'required',
            'namaLengkap' => 'required',
            'NIK' => 'required',
            'jk' => 'required',
            'tempatLahir' => 'required',
            'tanggalLahir' => 'required',
            'agama' => 'required',
            'pendidikan' => 'required',
            'jenisPekerjaan' => 'required',
            'goldar' => 'required',
            'statusPerkawinan' => 'required',
            'tanggalPerkawinan' => 'required',
            'statusHubungan' => 'required',
            'kewarganegaraan' => 'required',
            'noPaspor' => 'required',
            'noKitap' => 'required',
            'namaAyah' => 'required',
            'namaIbu' => 'required',
            'namaKepalaKeluarga' => 'required',
            'alamat' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'kodePos' => 'required',
            'desa' => 'required',
            'kecamatan' => 'required',
            'kabupaten' => 'required',
            'provinsi' => 'required',
            'tanggalDikeluarkan' => 'required',
            'tipePenduduk' => 'required',
            'statusNik' => 'required',
        ]);

        penduduk::create($validated);
        return redirect('data/kependudukan')->with('berhasil', 'Berhasil menambahkan petugas!');
    }

    public function import(Request $request){
        $data = $request->file('file');

        $namafile = $data->getClientOriginalName();
        $data->move('pendudukData', $namafile);

        Excel::import(new pendudukImport, \public_path('/pendudukdata/'.$namafile));
        return \redirect()->back();
    }
    public function destroy(penduduk $item, $id) {
        if (penduduk::destroy($id)) {
            return redirect()->back()->with('berhasil', 'Berhasil menghapus pengguna!');
        } else {
            return redirect()->back()->with('gagal', 'Gagal menghapus pengguna!');
        }
    }
}
