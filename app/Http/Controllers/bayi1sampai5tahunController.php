<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\bayi1sampai5tahun;
use App\Models\penduduk;
use Illuminate\Http\Request;
use App\Imports\bayi1sampai5tahunImport;
use Maatwebsite\Excel\Facades\Excel;

class bayi1sampai5tahunController extends Controller
{
    public function bayi1sampai5tahun()
    {
        return view('kelola_data_masyarakat/bayi1sampai5tahun', [
            'bayi1sampai5tahun'  => bayi1sampai5tahun::all(),
            'title' => 'Data bayi 1 sampai 5 tahun',
            'page'  => 'bayi1sampai5tahun'
        ]);
    }
    public function bayi1sampai5tahunInput()
    {
        return view('kelola_data_masyarakat/input', [
            'title' => 'Input bayi',
            'page'  => 'Input bayi'
        ]);
    }
    public function getDataByNIK($NIK_CARI)
    {
        $penduduk = penduduk::where('NIK', $NIK_CARI)->first();
        return response()->json($penduduk);
    }

    public function kirimbayi1sampai5tahun(Request $request)
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
            $bayi1sampai5tahun = new bayi1sampai5tahun();
            $bayi1sampai5tahun->NIK = $nik_pendudukan->NIK;
            $bayi1sampai5tahun->namaLengkap = $nama_pendudukan->namaLengkap;
            $bayi1sampai5tahun->jk = $jk_pendudukan->jk;
            $bayi1sampai5tahun->tempatLahir = $tempat_pendudukan->tempatLahir;
            $bayi1sampai5tahun->tanggalLahir = $tanggal_pendudukan->tanggalLahir;
            $bayi1sampai5tahun->agama = $agama_pendudukan->agama;
            $bayi1sampai5tahun->namaAyah = $ayah_pendudukan->namaAyah;
            $bayi1sampai5tahun->namaIbu = $ibu_pendudukan->namaIbu;
            $bayi1sampai5tahun->namaKepalaKeluarga = $kepalaKeluarga_pendudukan->namaKepalaKeluarga;
            $bayi1sampai5tahun->alamat = $alamat_pendudukan->alamat;
            $bayi1sampai5tahun->rt = $rt_pendudukan->rt;
            $bayi1sampai5tahun->rw = $rw_pendudukan->rw;
            $bayi1sampai5tahun->kodePos = $kodePos_pendudukan->kodePos;
            $bayi1sampai5tahun->desa = $desa_pendudukan->desa;
            $bayi1sampai5tahun->kecamatan = $kecamatan_pendudukan->kecamatan;
            $bayi1sampai5tahun->kabupaten = $kabupaten_pendudukan->kabupaten;
            $bayi1sampai5tahun->provinsi = $provinsi_pendudukan->provinsi;
            // Tambahkan kolom-kolom lain sesuai kebutuhan
            $bayi1sampai5tahun->save();

            // Tampilkan pesan sukses atau redirect ke halaman tertentu
            return redirect('data/bayi1sampai5tahun')->with('berhasil', 'Berhasil menambahkan petugas!');
        }
    }

    public function importbayi1sampai5tahun(Request $request)
    {
        $data = $request->file('file');

        $namafile = $data->getClientOriginalName();
        $data->move('bayi1sampai5tahunData', $namafile);

        Excel::import(new bayi1sampai5tahunImport, \public_path('/bayi1sampai5tahundata/' . $namafile));
        return \redirect()->back();
    }
    public function destroy(bayi1sampai5tahun $item, $id)
    {
        if (bayi1sampai5tahun::destroy($id)) {
            return redirect()->back()->with('berhasil', 'Berhasil menghapus pengguna!');
        } else {
            return redirect()->back()->with('gagal', 'Gagal menghapus pengguna!');
        }
    }
}
