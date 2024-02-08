<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\kelahiran;
use App\Models\penduduk;
use Illuminate\Http\Request;
use App\Imports\kelahiranImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Events\KelahiranSimpan;

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
    {
        $request->validate([
            'noKK' => 'required|numeric',
            'nik' => 'required|numeric',
            'namaLengkap' => 'required',
            'jk' => 'required',
            'tempatLahir' => 'required',
            'tanggalLahir' => 'required',
            'agama' => 'required',
            'namaIbu' => 'required',
            'namaAyah' => 'required',
            'namaKepalaKeluarga' => 'required',
            'alamat' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'kodePos' => 'required',
            'desa' => 'required',
            'kecamatan' => 'required',
            'kabupaten' => 'required',
            'provinsi' => 'required',
        ]);
    
        // Inisialisasi variabel untuk menyimpan data NIK dan namaLengkap
        $nik_pendudukan = null;
        $nama_pendudukan = null;
    
        // Cek apakah NIK diberikan oleh pengguna
        if ($request->has('nik')) {
            // Ambil data dari tabel kependudukan berdasarkan NIK
            $nik_pendudukan = Penduduk::where('nik', $request->nik)->first();
            $nama_pendudukan = $nik_pendudukan ? $nik_pendudukan->namaLengkap : null;
        }
    
        // Jika NIK tidak diberikan atau tidak ditemukan, gunakan input manual
        if (!$nik_pendudukan) {
            $nik_pendudukan = new \stdClass(); // Objek kosong untuk menghindari kesalahan
            $nik_pendudukan->NIK = $request->nik ?: null;
            $nama_pendudukan = $request->namaLengkap;
            $noKK = $request->noKK;
            $jk = $request->jk;
            $tempatLahir = $request->tempatLahir;
            $tanggalLahir = $request->tanggalLahir;
            $agama = $request->agama;
            $namaAyah = $request->namaAyah;
            $namaIbu = $request->namaIbu;
            $namaKepalaKeluarga = $request->namaKepalaKeluarga;
            $alamat = $request->alamat;
            $kewarganegaraan = $request->kewarganegaraan;
            $rt = $request->rt;
            $rw = $request->rw;
            $kodePos = $request->kodePos;
            $desa = $request->desa;
            $kecamatan = $request->kecamatan;
            $kabupaten = $request->kabupaten;
            $provinsi = $request->provinsi;
        }
    
        // Simpan data ke tabel kelahiran
        $kelahiran = new Kelahiran();
        $kelahiran->NIK = $nik_pendudukan->NIK;
        $kelahiran->namaLengkap = $nama_pendudukan;
        $kelahiran->noKK = $noKK;
        $kelahiran->jk = $jk;
        $kelahiran->tempatLahir = $tempatLahir;
        $kelahiran->tanggalLahir = $tanggalLahir;
        $kelahiran->agama = $agama;
        $kelahiran->namaAyah = $namaAyah;
        $kelahiran->namaIbu = $namaIbu;
        $kelahiran->namaKepalaKeluarga = $namaKepalaKeluarga;
        $kelahiran->alamat = $alamat;
        $kelahiran->kewarganegaraan = $kewarganegaraan;
        $kelahiran->rt = $rt;
        $kelahiran->rw = $rw;
        $kelahiran->kodePos = $kodePos;
        $kelahiran->desa = $desa;
        $kelahiran->kecamatan = $kecamatan;
        $kelahiran->kabupaten = $kabupaten;
        $kelahiran->provinsi = $provinsi;
    
        $kelahiran->save();
    
        // Setelah operasi INSERT pada tabel kelahiran, lemparkan event
        event(new KelahiranSimpan($nik_pendudukan->NIK, $nama_pendudukan, $noKK, $jk, $tempatLahir, $tanggalLahir, $agama, $namaAyah, $namaIbu, $namaKepalaKeluarga, $alamat, $kewarganegaraan, $rt, $rw, $kodePos, $desa, $kecamatan, $kabupaten, $provinsi));
    
        // Tampilkan pesan sukses atau redirect ke halaman tertentu
        return redirect('data/kelahiran')->with('berhasil', 'Berhasil menambahkan kelahiran!');
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
