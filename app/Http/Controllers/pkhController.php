<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\pkh;
use App\Models\penduduk;
use Illuminate\Http\Request;
use App\Imports\pkhImport;
use Maatwebsite\Excel\Facades\Excel;

class pkhController extends Controller
{
    public function pkh()
    {
        return view('kelola_data_masyarakat/pkh', [
            'pkh'  => pkh::all(),
            'title' => 'Data program keluarga harapan',
            'page'  => 'pkh'
        ]);
    }
    public function pkhInput()
    {
        return view('kelola_data_masyarakat/input', [
            'title' => 'Input pkh',
            'page'  => 'Input pkh'
        ]);
    }
    public function getDataByNIK($NIK_CARI)
    {
        $penduduk = penduduk::where('NIK', $NIK_CARI)->first();
        return response()->json($penduduk);
    }

    public function kirimpkh(Request $request)
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
            $pkh = new pkh();
            $pkh->NIK = $nik_pendudukan->NIK;
            $pkh->namaLengkap = $nama_pendudukan->namaLengkap;
            $pkh->jk = $jk_pendudukan->jk;
            $pkh->tempatLahir = $tempat_pendudukan->tempatLahir;
            $pkh->tanggalLahir = $tanggal_pendudukan->tanggalLahir;
            $pkh->agama = $agama_pendudukan->agama;
            $pkh->namaAyah = $ayah_pendudukan->namaAyah;
            $pkh->namaIbu = $ibu_pendudukan->namaIbu;
            $pkh->namaKepalaKeluarga = $kepalaKeluarga_pendudukan->namaKepalaKeluarga;
            $pkh->alamat = $alamat_pendudukan->alamat;
            $pkh->rt = $rt_pendudukan->rt;
            $pkh->rw = $rw_pendudukan->rw;
            $pkh->kodePos = $kodePos_pendudukan->kodePos;
            $pkh->desa = $desa_pendudukan->desa;
            $pkh->kecamatan = $kecamatan_pendudukan->kecamatan;
            $pkh->kabupaten = $kabupaten_pendudukan->kabupaten;
            $pkh->provinsi = $provinsi_pendudukan->provinsi;
            // Tambahkan kolom-kolom lain sesuai kebutuhan
            $pkh->save();

            // Tampilkan pesan sukses atau redirect ke halaman tertentu
            return redirect('data/pkh')->with('berhasil', 'Berhasil menambahkan petugas!');
        }
    }

    public function importpkh(Request $request)
    {
        $data = $request->file('file');

        $namafile = $data->getClientOriginalName();
        $data->move('pkhData', $namafile);

        Excel::import(new pkhImport, \public_path('/pkhdata/' . $namafile));
        return \redirect()->back();
    }
    public function destroy(pkh $item, $id)
    {
        if (pkh::destroy($id)) {
            return redirect()->back()->with('berhasil', 'Berhasil menghapus pengguna!');
        } else {
            return redirect()->back()->with('gagal', 'Gagal menghapus pengguna!');
        }
    }
}
