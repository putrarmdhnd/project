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
            'bbp'  => bbp::all(),
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
            $bbp = new bbp();
            $bbp->NIK = $nik_pendudukan->NIK;
            $bbp->namaLengkap = $nama_pendudukan->namaLengkap;
            $bbp->jk = $jk_pendudukan->jk;
            $bbp->tempatLahir = $tempat_pendudukan->tempatLahir;
            $bbp->tanggalLahir = $tanggal_pendudukan->tanggalLahir;
            $bbp->agama = $agama_pendudukan->agama;
            $bbp->namaAyah = $ayah_pendudukan->namaAyah;
            $bbp->namaIbu = $ibu_pendudukan->namaIbu;
            $bbp->namaKepalaKeluarga = $kepalaKeluarga_pendudukan->namaKepalaKeluarga;
            $bbp->alamat = $alamat_pendudukan->alamat;
            $bbp->rt = $rt_pendudukan->rt;
            $bbp->rw = $rw_pendudukan->rw;
            $bbp->kodePos = $kodePos_pendudukan->kodePos;
            $bbp->desa = $desa_pendudukan->desa;
            $bbp->kecamatan = $kecamatan_pendudukan->kecamatan;
            $bbp->kabupaten = $kabupaten_pendudukan->kabupaten;
            $bbp->provinsi = $provinsi_pendudukan->provinsi;
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
