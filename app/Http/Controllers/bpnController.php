<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\bpn;
use App\Models\penduduk;
use Illuminate\Http\Request;
use App\Imports\bpnImport;
use Maatwebsite\Excel\Facades\Excel;

class bpnController extends Controller
{
    public function bpn()
    {
        return view('kelola_data_masyarakat/bpn', [
            'bpn'  => bpn::all(),
            'title' => 'Data masyakarat Bantuan Pangan Non Tunai',
            'page'  => 'bpn'
        ]);
    }
    public function bpnInput()
    {
        return view('kelola_data_masyarakat/input', [
            'title' => 'Input bpn',
            'page'  => 'Input bpn'
        ]);
    }
    public function getDataByNIK($NIK_CARI)
    {
        $penduduk = penduduk::where('NIK', $NIK_CARI)->first();
        return response()->json($penduduk);
    }

    public function kirimbpn(Request $request)
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
            $bpn = new bpn();
            $bpn->NIK = $nik_pendudukan->NIK;
            $bpn->namaLengkap = $nama_pendudukan->namaLengkap;
            $bpn->jk = $jk_pendudukan->jk;
            $bpn->tempatLahir = $tempat_pendudukan->tempatLahir;
            $bpn->tanggalLahir = $tanggal_pendudukan->tanggalLahir;
            $bpn->agama = $agama_pendudukan->agama;
            $bpn->namaAyah = $ayah_pendudukan->namaAyah;
            $bpn->namaIbu = $ibu_pendudukan->namaIbu;
            $bpn->namaKepalaKeluarga = $kepalaKeluarga_pendudukan->namaKepalaKeluarga;
            $bpn->alamat = $alamat_pendudukan->alamat;
            $bpn->rt = $rt_pendudukan->rt;
            $bpn->rw = $rw_pendudukan->rw;
            $bpn->kodePos = $kodePos_pendudukan->kodePos;
            $bpn->desa = $desa_pendudukan->desa;
            $bpn->kecamatan = $kecamatan_pendudukan->kecamatan;
            $bpn->kabupaten = $kabupaten_pendudukan->kabupaten;
            $bpn->provinsi = $provinsi_pendudukan->provinsi;
            // Tambahkan kolom-kolom lain sesuai kebutuhan
            $bpn->save();

            // Tampilkan pesan sukses atau redirect ke halaman tertentu
            return redirect('data/bpn')->with('berhasil', 'Berhasil menambahkan petugas!');
        }
    }

    public function importbpn(Request $request)
    {
        $data = $request->file('file');

        $namafile = $data->getClientOriginalName();
        $data->move('bpnData', $namafile);

        Excel::import(new bpnImport, \public_path('/bpndata/' . $namafile));
        return \redirect()->back();
    }
    public function destroy(bpn $item, $id)
    {
        if (bpn::destroy($id)) {
            return redirect()->back()->with('berhasil', 'Berhasil menghapus pengguna!');
        } else {
            return redirect()->back()->with('gagal', 'Gagal menghapus pengguna!');
        }
    }
}
