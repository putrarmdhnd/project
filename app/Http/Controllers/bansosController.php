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
            'bansos'  => bansos::all(),
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
            $bansos = new bansos();
            $bansos->NIK = $nik_pendudukan->NIK;
            $bansos->namaLengkap = $nama_pendudukan->namaLengkap;
            $bansos->jk = $jk_pendudukan->jk;
            $bansos->tempatLahir = $tempat_pendudukan->tempatLahir;
            $bansos->tanggalLahir = $tanggal_pendudukan->tanggalLahir;
            $bansos->agama = $agama_pendudukan->agama;
            $bansos->namaAyah = $ayah_pendudukan->namaAyah;
            $bansos->namaIbu = $ibu_pendudukan->namaIbu;
            $bansos->namaKepalaKeluarga = $kepalaKeluarga_pendudukan->namaKepalaKeluarga;
            $bansos->alamat = $alamat_pendudukan->alamat;
            $bansos->rt = $rt_pendudukan->rt;
            $bansos->rw = $rw_pendudukan->rw;
            $bansos->kodePos = $kodePos_pendudukan->kodePos;
            $bansos->desa = $desa_pendudukan->desa;
            $bansos->kecamatan = $kecamatan_pendudukan->kecamatan;
            $bansos->kabupaten = $kabupaten_pendudukan->kabupaten;
            $bansos->provinsi = $provinsi_pendudukan->provinsi;
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
