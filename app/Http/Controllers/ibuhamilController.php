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
                'namaLengkap' => 'required',
                'jk' => 'required',
                'tempatLahir' => 'required',
                'tanggalLahir' => 'required',
                'agama' => 'required',
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
            ]);

            // Ambil data dari tabel kependudukan berdasarkan NIK
            $nik_pendudukan = penduduk::where('nik', $request->nik)->first();
            $nama_pendudukan = penduduk::where('nik', $request->nik)->first('namaLengkap');
            $jk_pendudukan = penduduk::where('nik', $request->nik)->first('jk');
            $tempat_pendudukan = penduduk::where('nik', $request->nik)->first('tempatLahir');
            $tanggal_pendudukan = penduduk::where('nik', $request->nik)->first('tanggalLahir');
            $agama_pendudukan = penduduk::where('nik', $request->nik)->first('agama');
            $ayah_pendudukan = penduduk::where('nik', $request->nik)->first('namaAyah');
            $ibu_pendudukan = penduduk::where('nik', $request->nik)->first('namaIbu');
            $kepalaKeluarga_pendudukan = penduduk::where('nik', $request->nik)->first('namaKepalaKeluarga');
            $alamat_pendudukan = penduduk::where('nik', $request->nik)->first('alamat');
            $rt_pendudukan = penduduk::where('nik', $request->nik)->first('rt');
            $rw_pendudukan = penduduk::where('nik', $request->nik)->first('rw');
            $kodePos_pendudukan = penduduk::where('nik', $request->nik)->first('kodePos');
            $desa_pendudukan = penduduk::where('nik', $request->nik)->first('desa');
            $kecamatan_pendudukan = penduduk::where('nik', $request->nik)->first('kecamatan');
            $kabupaten_pendudukan = penduduk::where('nik', $request->nik)->first('kabupaten');
            $provinsi_pendudukan = penduduk::where('nik', $request->nik)->first('provinsi');

            // Simpan data ke tabel kematian
            $ibuhamil = new ibuhamil();
            $ibuhamil->NIK = $nik_pendudukan->NIK;
            $ibuhamil->namaLengkap = $nama_pendudukan->namaLengkap;
            $ibuhamil->jk = $jk_pendudukan->jk;
            $ibuhamil->tempatLahir = $tempat_pendudukan->tempatLahir;
            $ibuhamil->tanggalLahir = $tanggal_pendudukan->tanggalLahir;
            $ibuhamil->agama = $agama_pendudukan->agama;
            $ibuhamil->namaAyah = $ayah_pendudukan->namaAyah;
            $ibuhamil->namaIbu = $ibu_pendudukan->namaIbu;
            $ibuhamil->namaKepalaKeluarga = $kepalaKeluarga_pendudukan->namaKepalaKeluarga;
            $ibuhamil->alamat = $alamat_pendudukan->alamat;
            $ibuhamil->rt = $rt_pendudukan->rt;
            $ibuhamil->rw = $rw_pendudukan->rw;
            $ibuhamil->kodePos = $kodePos_pendudukan->kodePos;
            $ibuhamil->desa = $desa_pendudukan->desa;
            $ibuhamil->kecamatan = $kecamatan_pendudukan->kecamatan;
            $ibuhamil->kabupaten = $kabupaten_pendudukan->kabupaten;
            $ibuhamil->provinsi = $provinsi_pendudukan->provinsi;
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
