<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\anakyatim;
use App\Models\penduduk;
use Illuminate\Http\Request;
use App\Imports\anakyatimImport;
use Maatwebsite\Excel\Facades\Excel;

class anakyatimController extends Controller
{
    public function anakyatim()
    {
        return view('kelola_data_masyarakat/anakyatim', [
            'anakyatim'  => anakyatim::all(),
            'title' => 'Data masyakarat Anak Yatim 1 Sampai 12 Tahun',
            'page'  => 'anakyatim'
        ]);
    }
    public function anakyatimInput()
    {
        return view('kelola_data_masyarakat/input', [
            'title' => 'Input yatim',
            'page'  => 'Input yatim'
        ]);
    }
    public function getDataByNIK($NIK_CARI)
    {
        $penduduk = penduduk::where('NIK', $NIK_CARI)->first();
        return response()->json($penduduk);
    }

    public function kirimanakyatim(Request $request)
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
            $anakyatim = new anakyatim();
            $anakyatim->NIK = $nik_pendudukan->NIK;
            $anakyatim->namaLengkap = $nama_pendudukan->namaLengkap;
            $anakyatim->jk = $jk_pendudukan->jk;
            $anakyatim->tempatLahir = $tempat_pendudukan->tempatLahir;
            $anakyatim->tanggalLahir = $tanggal_pendudukan->tanggalLahir;
            $anakyatim->agama = $agama_pendudukan->agama;
            $anakyatim->namaAyah = $ayah_pendudukan->namaAyah;
            $anakyatim->namaIbu = $ibu_pendudukan->namaIbu;
            $anakyatim->namaKepalaKeluarga = $kepalaKeluarga_pendudukan->namaKepalaKeluarga;
            $anakyatim->alamat = $alamat_pendudukan->alamat;
            $anakyatim->rt = $rt_pendudukan->rt;
            $anakyatim->rw = $rw_pendudukan->rw;
            $anakyatim->kodePos = $kodePos_pendudukan->kodePos;
            $anakyatim->desa = $desa_pendudukan->desa;
            $anakyatim->kecamatan = $kecamatan_pendudukan->kecamatan;
            $anakyatim->kabupaten = $kabupaten_pendudukan->kabupaten;
            $anakyatim->provinsi = $provinsi_pendudukan->provinsi;
            // Tambahkan kolom-kolom lain sesuai kebutuhan
            $anakyatim->save();

            // Tampilkan pesan sukses atau redirect ke halaman tertentu
            return redirect('data/anakyatim')->with('berhasil', 'Berhasil menambahkan petugas!');
        }
    }

    public function importanakyatim(Request $request)
    {
        $data = $request->file('file');

        $namafile = $data->getClientOriginalName();
        $data->move('anakyatimData', $namafile);

        Excel::import(new anakyatimImport, \public_path('/anakyatimdata/' . $namafile));
        return \redirect()->back();
    }
    public function destroy(anakyatim $item, $id)
    {
        if (anakyatim::destroy($id)) {
            return redirect()->back()->with('berhasil', 'Berhasil menghapus pengguna!');
        } else {
            return redirect()->back()->with('gagal', 'Gagal menghapus pengguna!');
        }
    }
}
