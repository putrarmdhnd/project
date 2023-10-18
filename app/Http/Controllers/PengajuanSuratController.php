<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\PengajuanSurat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PengajuanSuratController extends Controller
{

    public function index()
    {

        if (Auth::user()->level == 'masyarakat') {
            $pengajuan_saya = PengajuanSurat::with('masyarakat')->whereMasyarakatId(Auth::user()->id)->get();
        } else {
            $pengajuan_saya = PengajuanSurat::with('masyarakat')->get();
        }

        return view('pengajuan_surat.index', [
            'title' => 'Pengajuan Surat Online',
            'pengajuan_saya' => $pengajuan_saya
        ]);
    }

    public function create(Request $request)
    {

        if ($request->surat == 'keterangan') {
            return view('pengajuan_surat.form_surat_keterangan', [
                'title' => 'Pengajuan Surat Keterangan',
            ]);
        } elseif ($request->surat === 'kelahiran') {
            return view('pengajuan_surat.form_surat_kelahiran', [
                'title' => 'Pengajuan Surat Keterangan Kelahiran',
            ]);
        } elseif ($request->surat === 'kematian') {
            return view('pengajuan_surat.form_surat_kematian', [
                'title' => 'Pengajuan Surat Keterangan Kematian',
            ]);
        }elseif ($request->surat === 'keterangan_domisili_haji') {
            return view('pengajuan_surat.form_surat_keterangan_domisili_haji', [
                'title' => 'Pengajuan Surat Keterangan Domisili Haji',
            ]);
        }elseif ($request->surat === 'keterangan_domisili_yayasan') {
            return view('pengajuan_surat.form_surat_keterangan_domisili_yayasan', [
                'title' => 'Pengajuan Surat Keterangan Domisili yayasan',
            ]);
        }elseif ($request->surat === 'keterangan_penguburan') {
            return view('pengajuan_surat.form_surat_keterangan_penguburan', [
                'title' => 'Pengajuan Surat Keterangan penguburan',
            ]);
        }elseif ($request->surat === 'keterangan_numpang_nikah') {
            return view('pengajuan_surat.form_surat_keterangan_numpang_nikah', [
                'title' => 'Pengajuan Surat Keterangan numpang nikah',
            ]);
        }elseif ($request->surat === 'keterangan_duda_janda') {
            return view('pengajuan_surat.form_surat_keterangan_duda_janda', [
                'title' => 'Pengajuan Surat Keterangan duda/janda',
            ]);
        }elseif ($request->surat === 'keterangan_tentang_perkawinan') {
            return view('pengajuan_surat.form_surat_keterangan_tentang_perkawinan', [
                'title' => 'Pengajuan Surat Keterangan tentang perkawinan',
            ]);
        }elseif ($request->surat === 'keterangan_belum_nikah') {
            return view('pengajuan_surat.form_surat_keterangan_belum_nikah', [
                'title' => 'Pengajuan Surat Keterangan belum nikah',
            ]);
        }elseif ($request->surat === 'keterangan_pindah_WNI') {
            return view('pengajuan_surat.form_surat_keterangan_pindah_WNI', [
                'title' => 'Pengajuan Surat Keterangan pindah WNI',
            ]);
        }elseif ($request->surat === 'keterangan_pindah') {
            return view('pengajuan_surat.form_surat_keterangan_pindah', [
                'title' => 'Pengajuan Surat Keterangan pindah',
            ]);
        }elseif ($request->surat === 'keterangan_tidak_mampu') {
            return view('pengajuan_surat.form_surat_keterangan_tidak_mampu', [
                'title' => 'Pengajuan Surat Keterangan tidak mampu',
            ]);
        }elseif ($request->surat === 'keterangan_usaha') {
            return view('pengajuan_surat.form_surat_keterangan_usaha', [
                'title' => 'Pengajuan Surat Keterangan usaha',
            ]);
        }elseif ($request->surat === 'keterangan_domisili') {
            return view('pengajuan_surat.form_surat_keterangan_domisili', [
                'title' => 'Pengajuan Surat Keterangan domisili',
            ]);
        }elseif ($request->surat === 'keterangan_beda_nama_data') {
            return view('pengajuan_surat.form_surat_keterangan_beda_nama_data', [
                'title' => 'Pengajuan Surat Keterangan beda nama/data',
            ]);
        }elseif ($request->surat === 'keterangan_kehilangan') {
            return view('pengajuan_surat.form_surat_keterangan_kehilangan', [
                'title' => 'Pengajuan Surat Keterangan kehilangan',
            ]);
        }elseif ($request->surat === 'keterangan_orang_tua_wali') {
            return view('pengajuan_surat.form_surat_keterangan_orang_tua_wali', [
                'title' => 'Pengajuan Surat Keterangan orang tua wali',
            ]);
        }elseif ($request->surat === 'pengantar_pembuatan_kartu_keluarga') {
            return view('pengajuan_surat.form_surat_pengantar_Pembuatan_kartu_keluarga', [
                'title' => 'Pengajuan Surat pembuatan kartu keluarga',
            ]);
        }elseif ($request->surat === 'pengantar_keterangan_catatan_kepolisian') {
            return view('pengajuan_surat.form_surat_pengantar_keterangan_catatan_kepolisian', [
                'title' => 'Pengajuan Surat pengatar keterangan catatan kepolisian',
            ]);
        }elseif ($request->surat === 'surat_pernyataan_akad_nikah') {
            return view('pengajuan_surat.form_surat_pernyataan_akad_nikah', [
                'title' => 'Pengajuan Surat pernyataan akad nikah',
            ]);
        }elseif ($request->surat === 'surat_pernyataan_ahli_waris') {
            return view('pengajuan_surat.form_surat_pernyataan_ahli_waris', [
                'title' => 'Pengajuan Surat pernyataan ahli waris',
            ]);
        } else {
            return redirect()->route('pengajuan-surat.index');
        }
    }


    public function store(Request $request)
    {
        if ($request->jenis_surat == 'keterangan') {
            $request->validate([
                'nama' => 'required',
                'ttl' => 'required',
                'nik' => 'required',
                'no_kk' => 'required',
                'negara_agama' => 'required',
                'pekerjaan' => 'required',
                'alamat' => 'required',
                'keperluan' => 'required',
            ]);

            $data = $request->except('_token');
            $data['jenis_surat'] = 'Surat Keterangan';
        }elseif ($request->jenis_surat == 'keterangan Domisili Haji') {
            $request->validate([
                'nama' => 'required',
                'ttl' => 'required',
                'nik' => 'required',
                'no_kk' => 'required',
                'negara_agama' => 'required',
                'pekerjaan' => 'required',
                'alamat' => 'required',
                'JK' => 'required',
            ]);

            $data = $request->except('_token');
            $data['jenis_surat'] = 'Surat Keterangan Domisili Haji';
        }elseif ($request->jenis_surat == 'keterangan Domisili Yayasan') {
            $request->validate([
                'nama_pimpinan' => 'required',
                'ttl' => 'required',
                'nik' => 'required',
                'JK' => 'required',
                'pekerjaan' => 'required',
                'kewarganegaraan' => 'required',
                'alamat' => 'required',
                'nama_yayasan' => 'required',
                'jenis_yayasan' => 'required',
                'alamat_yayasan' => 'required',
                'akta_pendirian' => 'required',
                'sk_kemenkumham' => 'required',
                'jumlah_pengurus' => 'required',
                'penanggung_jawab_yayasan' => 'required',
            ]);

            $data = $request->except('_token');
            $data['jenis_surat'] = 'Surat Keterangan Domisili Yayasan';
        }elseif ($request->jenis_surat == 'keterangan Penguburan') {
            $request->validate([
                'nama' => 'required',
                'ttl' => 'required',
                'nik' => 'required',
                'JK' => 'required',
                'kewarganegaraan' => 'required',
                'agama' => 'required',
                'status_perkawinan' => 'required',
                'pekerjaan' => 'required',
                'alamat' => 'required',
                'hari_tanggal' => 'required',
                'tempat_meninggal' => 'required',
                'dikuburkan' => 'required',
                'waktu' => 'required',
                'tempat_penguburan' => 'required',
            ]);

            $data = $request->except('_token');
            $data['jenis_surat'] = 'Surat Keterangan Penguburan';
        }elseif ($request->jenis_surat == 'keterangan Tentang Perkawinan') {
            $request->validate([
                'nama_laki' => 'required',
                'ttl' => 'required',
                'pekerjaan_laki' => 'required',
                'warganegara_laki' => 'required',
                'alamat_laki' => 'required',
                'nama_perempuan' => 'required',
                'ttl_perempuan' => 'required',
                'pekerjaan_perempuan' => 'required',
                'warganegara_perempuan' => 'required',
                'alamat_perempuan' => 'required',
            ]);

            $data = $request->except('_token');
            $data['jenis_surat'] = 'Surat Keterangan Tentang Perkawinan';
        } elseif ($request->jenis_surat == 'kelahiran') {
            $request->validate([
                'hari' => 'required',
                'tanggal' => 'required',
                'tempat_lahir' => 'required',
                'anak_ke' => 'required',
                'kelamin' => 'required',
                'nama_anak' => 'required',
                'nama_ibu' => 'required',
                'nik_ibu' => 'required',
                'ttl_ibu' => 'required',
                'pekerjaan_ibu' => 'required',
                'alamat_ibu' => 'required',
                'nama_ayah' => 'required',
                'nik_ayah' => 'required',
                'ttl_ayah' => 'required',
                'pekerjaan_ayah' => 'required',
                'alamat_ayah' => 'required',
                'nama_pelapor' => 'required',
                'nik_pelapor' => 'required',
                'ttl_pelapor' => 'required',
                'pekerjaan_pelapor' => 'required',
                'alamat_pelapor' => 'required',
                'hub_pelapor_anak' => 'required',
            ]);

            $data = $request->except('_token');
            $data['jenis_surat'] = 'Surat Kelahiran';
        } elseif ($request->jenis_surat == 'kematian') {
            $request->validate([
                'nama' => 'required',
                'nik' => 'required',
                'ttl' => 'required',
                'kelamin' => 'required',
                'agama' => 'required',
                'alamat' => 'required',
                'tgl_meninggal' => 'required',
                'tempat_meninggal' => 'required',
                'penyebab_meninggal' => 'required',
                'nama_pelapor' => 'required',
                'nik_pelapor' => 'required',
                'ttl_pelapor' => 'required',
                'pekerjaan_pelapor' => 'required',
                'alamat_pelapor' => 'required',
                'hub_pelapor_almarhum' => 'required',
            ]);

            $data = $request->except('_token');
            $data['jenis_surat'] = 'Surat Kematian';
        }

        PengajuanSurat::create([
            'masyarakat_id' => Auth::user()->id,
            'pesan' => $data['pesan'] ?? '-',
            'jenis_surat' => $data['jenis_surat'],
            'surat' => json_encode($data),
            'status' => 'Pending'
        ]);

        return redirect()->route('pengajuan-surat.index')->with('berhasil', 'Berhasil membuat pengajuan surat');
    }


    public function show(PengajuanSurat $pengajuanSurat)
    {
        if (Auth::user()->level == 'masyarakat') {
            if (Auth::user()->id == $pengajuanSurat->masyarakat_id) {
                return view('pengajuan_surat.detail', [
                    'title' => 'Detail Pengajuan Surat',
                    'pengajuan_surat' => $pengajuanSurat
                ]);
            } else {
                return redirect('/');
            }
        } else {
            return view('pengajuan_surat.detail', [
                'title' => 'Detail Pengajuan Surat',
                'pengajuan_surat' => $pengajuanSurat
            ]);
        }
    }


    public function approve(PengajuanSurat $pengajuanSurat)
    {
        if (Auth::user()->level != 'masyarakat') {
            $pengajuanSurat->update(['status' => 'Diproses']);
            return redirect()->route('pengajuan-surat.index')->with('berhasil', 'Berhasil diproses pengajuan surat!');
        } else {
            return redirect('/');
        }
    }

    public function reject(PengajuanSurat $pengajuanSurat)
    {
        if (Auth::user()->level != 'masyarakat') {
            $pengajuanSurat->update(['status' => 'Ditolak']);
            return redirect()->route('pengajuan-surat.index')->with('berhasil', 'Berhasil menolak pengajuan surat!');
        } else {
            return redirect('/');
        }
    }


    public function edit(PengajuanSurat $pengajuanSurat)
    {
        if (Auth::user()->level == 'masyarakat') {
            return redirect('/');
        } else {
            if ($pengajuanSurat->status == 'Diproses') {
                if ($pengajuanSurat->jenis_surat == 'Surat Keterangan') {
                    return view('pengajuan_surat.proses_surat_keterangan', [
                        'title' => 'Proses Surat Keterangan',
                        'pengajuan_surat' => $pengajuanSurat
                    ]);
                }elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Domisili Haji') {
                    return view('pengajuan_surat.proses_surat_keterangan_domisili_haji', [
                        'title' => 'Proses Surat Keterangan Dimisili Haji',
                        'pengajuan_surat' => $pengajuanSurat
                    ]);
                }elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Domisili Yayasan') {
                    return view('pengajuan_surat.proses_surat_keterangan_domisili_yayasan', [
                        'title' => 'Proses Surat Keterangan Dimisili Yayasan',
                        'pengajuan_surat' => $pengajuanSurat
                    ]);
                }elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Penguburan') {
                    return view('pengajuan_surat.proses_surat_keterangan_penguburan', [
                        'title' => 'Proses Surat Keterangan Penguburan',
                        'pengajuan_surat' => $pengajuanSurat
                    ]);
                }elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Tentang Perkawinan') {
                    return view('pengajuan_surat.proses_surat_keterangan_tentang_perkawinan', [
                        'title' => 'Proses Surat Keterangan tentang perkawinan',
                        'pengajuan_surat' => $pengajuanSurat
                    ]);
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Kelahiran') {
                    return view('pengajuan_surat.proses_surat_kelahiran', [
                        'title' => 'Proses Surat Keterangan Kelahiran',
                        'pengajuan_surat' => $pengajuanSurat
                    ]);
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Kematian') {
                    return view('pengajuan_surat.proses_surat_kematian', [
                        'title' => 'Proses Surat Keterangan Kematian',
                        'pengajuan_surat' => $pengajuanSurat
                    ]);
                } else {
                    return redirect()->route('pengajuan-surat.index');
                }
            } else {
                return redirect('/');
            }
        }
    }


    public function update(Request $request, PengajuanSurat $pengajuanSurat)
    {
        if ($pengajuanSurat->jenis_surat == 'Surat Keterangan') {
            $request->validate([
                'nama' => 'required',
                'ttl' => 'required',
                'nik' => 'required',
                'no_kk' => 'required',
                'negara_agama' => 'required',
                'pekerjaan' => 'required',
                'alamat' => 'required',
                'keperluan' => 'required',
                'kode_desa' => 'required',
                'nomor_surat' => 'required',
            ]);

            $data = $request->except('_token');
        }elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Domisili Haji') {
            $request->validate([
                'nama' => 'required',
                'ttl' => 'required',
                'nik' => 'required',
                'no_kk' => 'required',
                'negara_agama' => 'required',
                'pekerjaan' => 'required',
                'alamat' => 'required',
                'JK' => 'required',
                'kode_desa' => 'required',
                'nomor_surat' => 'required',
            ]);

            $data = $request->except('_token');
        }elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Domisili Yayasan') {
            $request->validate([
                'nama_pimpinan' => 'required',
                'ttl' => 'required',
                'nik' => 'required',
                'JK' => 'required',
                'pekerjaan' => 'required',
                'kewarganegaraan' => 'required',
                'alamat' => 'required',
                'nama_yayasan' => 'required',
                'jenis_yayasan' => 'required',
                'alamat_yayasan' => 'required',
                'akta_pendirian' => 'required',
                'sk_kemenkumham' => 'required',
                'jumlah_pengurus' => 'required',
                'penanggung_jawab_yayasan' => 'required',
            ]);

            $data = $request->except('_token');
        }elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Penguburan') {
            $request->validate([
                'nama' => 'required',
                'ttl' => 'required',
                'nik' => 'required',
                'JK' => 'required',
                'kewarganegaraan' => 'required',
                'agama' => 'required',
                'status_perkawinan' => 'required',
                'pekerjaan' => 'required',
                'alamat' => 'required',
                'hari_tanggal' => 'required',
                'tempat_meninggal' => 'required',
                'dikuburkan' => 'required',
                'waktu' => 'required',
                'tempat_penguburan' => 'required',
            ]);

            $data = $request->except('_token');
        }elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Tentang Perkawinan') {
            $request->validate([
                'nama_laki' => 'required',
                'ttl' => 'required',
                'pekerjaan_laki' => 'required',
                'warganegara_laki' => 'required',
                'alamat_laki' => 'required',
                'nama_perempuan' => 'required',
                'ttl_perempuan' => 'required',
                'pekerjaan_perempuan' => 'required',
                'warganegara_perempuan' => 'required',
                'alamat_perempuan' => 'required',
            ]);

            $data = $request->except('_token');
        } elseif ($pengajuanSurat->jenis_surat === 'Surat Kelahiran') {
            $request->validate([
                'hari' => 'required',
                'tanggal' => 'required',
                'tempat_lahir' => 'required',
                'anak_ke' => 'required',
                'kelamin' => 'required',
                'nama_anak' => 'required',
                'nama_ibu' => 'required',
                'nik_ibu' => 'required',
                'ttl_ibu' => 'required',
                'pekerjaan_ibu' => 'required',
                'alamat_ibu' => 'required',
                'nama_ayah' => 'required',
                'nik_ayah' => 'required',
                'ttl_ayah' => 'required',
                'pekerjaan_ayah' => 'required',
                'alamat_ayah' => 'required',
                'nama_pelapor' => 'required',
                'nik_pelapor' => 'required',
                'ttl_pelapor' => 'required',
                'pekerjaan_pelapor' => 'required',
                'alamat_pelapor' => 'required',
                'hub_pelapor_anak' => 'required',
                'nomor_surat' => 'required',
            ]);

            $data = $request->except('_token');
        } elseif ($pengajuanSurat->jenis_surat === 'Surat Kematian') {
            $request->validate([
                'nama' => 'required',
                'nik' => 'required',
                'ttl' => 'required',
                'kelamin' => 'required',
                'agama' => 'required',
                'alamat' => 'required',
                'tgl_meninggal' => 'required',
                'tempat_meninggal' => 'required',
                'penyebab_meninggal' => 'required',
                'nama_pelapor' => 'required',
                'nik_pelapor' => 'required',
                'ttl_pelapor' => 'required',
                'pekerjaan_pelapor' => 'required',
                'alamat_pelapor' => 'required',
                'hub_pelapor_almarhum' => 'required',
                'nomor_surat' => 'required',
            ]);

            $data = $request->except('_token');
        } else {
            return redirect()->route('pengajuan-surat.index');
        }

        $pengajuanSurat->update([
            'surat' => json_encode($data),
            'status' => 'Selesai'
        ]);

        return redirect()->route('pengajuan-surat.index')->with('berhasil', 'Berhasil membuat surat!');
    }


    public function destroy(PengajuanSurat $pengajuanSurat)
    {
        //
    }


    public function preview(PengajuanSurat $pengajuanSurat)
    {
        if (Auth::user()->level == 'masyarakat') {
            if ($pengajuanSurat->status == 'Selesai' && $pengajuanSurat->masyarakat_id == Auth::user()->id) {
                if ($pengajuanSurat->jenis_surat == 'Surat Keterangan') {
                    $html = 'pengajuan_surat.templates.surat_keterangan';
                }elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Domisili Haji') {
                    $html = 'pengajuan_surat.templates.surat_keterangan_domisili_haji';
                }elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Domisili Yayasan') {
                    $html = 'pengajuan_surat.templates.surat_keterangan_domisili_yayasan';
                }elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Penguburan') {
                    $html = 'pengajuan_surat.templates.surat_keterangan_penguburan';
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Kelahiran') {
                    $html = 'pengajuan_surat.templates.surat_kelahiran';
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Kematian') {
                    $html = 'pengajuan_surat.templates.surat_kematian';
                } else {
                    return redirect()->route('pengajuan-surat.index');
                }
            } else {
                return redirect('/');
            }
        } else {
            if ($pengajuanSurat->jenis_surat == 'Surat Keterangan') {
                $html = 'pengajuan_surat.templates.surat_keterangan';
            }elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Domisili Haji') {
                $html = 'pengajuan_surat.templates.surat_keterangan_domisili_haji';
            }elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Domisili Yayasan') {
                $html = 'pengajuan_surat.templates.surat_keterangan_domisili_yayasan';
            }elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Penguburan') {
                $html = 'pengajuan_surat.templates.surat_keterangan_penguburan';
            } elseif ($pengajuanSurat->jenis_surat === 'Surat Kelahiran') {
                $html = 'pengajuan_surat.templates.surat_kelahiran';
            } elseif ($pengajuanSurat->jenis_surat === 'Surat Kematian') {
                $html = 'pengajuan_surat.templates.surat_kematian';
            } else {
                return redirect()->route('pengajuan-surat.index');
            }
        }

        return Pdf::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView($html, [
            'pengajuan_surat' => $pengajuanSurat,
            'surat' => json_decode($pengajuanSurat->surat),
        ])->stream();
    }


    public function download(PengajuanSurat $pengajuanSurat)
    {
        if (Auth::user()->level == 'masyarakat') {
            if ($pengajuanSurat->status == 'Selesai' && $pengajuanSurat->masyarakat_id == Auth::user()->id) {
                if ($pengajuanSurat->jenis_surat == 'Surat Keterangan') {
                    $html = 'pengajuan_surat.templates.surat_keterangan';
                }elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Domisili Haji') {
                    $html = 'pengajuan_surat.templates.surat_keterangan_domisili_haji';
                }elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Domisili Yayasan') {
                    $html = 'pengajuan_surat.templates.surat_keterangan_domisili_yayasan';
                }elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Penguburan') {
                    $html = 'pengajuan_surat.templates.surat_keterangan_penguburan';
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Kelahiran') {
                    $html = 'pengajuan_surat.templates.surat_kelahiran';
                } elseif ($pengajuanSurat->jenis_surat === 'Surat Kematian') {
                    $html = 'pengajuan_surat.templates.surat_kematian';
                } else {
                    return redirect()->route('pengajuan-surat.index');
                }
            } else {
                return redirect('/');
            }
        } else {
            if ($pengajuanSurat->jenis_surat == 'Surat Keterangan') {
                $html = 'pengajuan_surat.templates.surat_keterangan';
            }elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Domisili Haji') {
                $html = 'pengajuan_surat.templates.surat_keterangan_domisili_haji';
            }elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Domisili Yayasan') {
                $html = 'pengajuan_surat.templates.surat_keterangan_domisili_yayasan';
            }elseif ($pengajuanSurat->jenis_surat === 'Surat Keterangan Penguburan') {
                $html = 'pengajuan_surat.templates.surat_keterangan_penguburan';
            } elseif ($pengajuanSurat->jenis_surat === 'Surat Kelahiran') {
                $html = 'pengajuan_surat.templates.surat_kelahiran';
            } elseif ($pengajuanSurat->jenis_surat === 'Surat Kematian') {
                $html = 'pengajuan_surat.templates.surat_kematian';
            } else {
                return redirect()->route('pengajuan-surat.index');
            }
        }

        return Pdf::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView($html, [
            'pengajuan_surat' => $pengajuanSurat,
            'surat' => json_decode($pengajuanSurat->surat),
        ])->download($pengajuanSurat->jenis_surat.'.pdf');
    }
}
