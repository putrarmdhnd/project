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
