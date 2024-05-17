<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\miskin;
use App\Models\penduduk;
use Illuminate\Http\Request;
use App\Imports\masyarakatmiskinImport;
use Maatwebsite\Excel\Facades\Excel;

class MiskinController extends Controller
{
    public function Miskin()
    {
        return view('kelola_data_masyarakat/masyarakatmiskin', [
            'miskin'  => miskin::all(),
            'title' => 'Data masyakarat miskin',
            'page'  => 'masyarakatmiskin'
        ]);
    }
    public function masyarakatMiskinInput()
    {
        return view('kelola_data_masyarakat/input', [
            'title' => 'Input miskin',
            'page'  => 'Input miskin'
        ]);
    }
    public function getDataByNIK($NIK_CARI)
    {
        $penduduk = penduduk::where('NIK', $NIK_CARI)->first();
        return response()->json($penduduk);
    }

    public function kirimMasyarakatMiskin(Request $request)
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
            $miskin = new miskin();
            $miskin->NIK = $nik_pendudukan->NIK;
            $miskin->namaLengkap = $nama_pendudukan->namaLengkap;
            $miskin->jk = $jk_pendudukan->jk;
            $miskin->tempatLahir = $tempat_pendudukan->tempatLahir;
            $miskin->tanggalLahir = $tanggal_pendudukan->tanggalLahir;
            $miskin->agama = $agama_pendudukan->agama;
            $miskin->namaAyah = $ayah_pendudukan->namaAyah;
            $miskin->namaIbu = $ibu_pendudukan->namaIbu;
            $miskin->namaKepalaKeluarga = $kepalaKeluarga_pendudukan->namaKepalaKeluarga;
            $miskin->alamat = $alamat_pendudukan->alamat;
            $miskin->rt = $rt_pendudukan->rt;
            $miskin->rw = $rw_pendudukan->rw;
            $miskin->kodePos = $kodePos_pendudukan->kodePos;
            $miskin->desa = $desa_pendudukan->desa;
            $miskin->kecamatan = $kecamatan_pendudukan->kecamatan;
            $miskin->kabupaten = $kabupaten_pendudukan->kabupaten;
            $miskin->provinsi = $provinsi_pendudukan->provinsi;
            // Tambahkan kolom-kolom lain sesuai kebutuhan
            $miskin->save();

            // Tampilkan pesan sukses atau redirect ke halaman tertentu
            return redirect('data/kematian')->with('berhasil', 'Berhasil menambahkan petugas!');
        }
    }

    public function importmiskin(Request $request)
    {
        $data = $request->file('file');

        $namafile = $data->getClientOriginalName();
        $data->move('miskinData', $namafile);

        Excel::import(new masyarakatmiskinImport, \public_path('/miskindata/' . $namafile));
        return \redirect()->back();
    }
    public function destroy(miskin $item, $id)
    {
        if (miskin::destroy($id)) {
            return redirect()->back()->with('berhasil', 'Berhasil menghapus pengguna!');
        } else {
            return redirect()->back()->with('gagal', 'Gagal menghapus pengguna!');
        }
    }
}
