@extends('templates/dashboard')
@section('content')
    @php
        $surat = json_decode($pengajuan_surat->surat);
    @endphp
    <div class="bg-white py-4 px-9 mb-5 rounded-lg flex flex-col lg:flex-row justify-center lg:justify-between items-center">
        <div class="text-center lg:text-left">
            <h1 class="text-lg lg:text-2xl text-danger font-semibold mb-2">Detail Pengajuan Surat</h1>
            <p class="text-base text-[13px] lg:text-lg font-normal text-secondary">{{ $pengajuan_surat->jenis_surat }}</p>
            @canany(['admin'])
            <p class="text-base text-[13px] lg:text-lg font-normal text-secondary">Jenis Surat : {{ $surat->kttd }}</p>
            @endcanany
        </div>
        @canany(['admin', 'petugas','kesra'])
            @if ($pengajuan_surat->status == 'Pending')
                <div class="mt-5 lg:mt-0 flex flex-col lg:flex-row justify-center text-center">
                    <form action="{{ route('pengajuan_surat.reject', $pengajuan_surat->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <button type="submit"
                            class="text-white bg-danger focus:outline-none font-medium text-xs rounded-lg lg:text-sm px-5 py-2.5 text-center">Tolak</button>
                    </form>
                    <form class="mt-3 ml-0 lg:ml-3 lg:mt-0" action="{{ route('pengajuan_surat.verifikasi', $pengajuan_surat->id) }}"
                        method="post">
                        @csrf
                        @method('PUT')
                        <button type="submit"
                            class="text-dark bg-warning focus:outline-none font-medium text-xs rounded-lg lg:text-sm px-5 py-2.5 text-center ">Verifikasi</button>
                    </form>

                </div>
            @endif
            @canany(['admin'])
            @if ($pengajuan_surat->status == 'Diproses')
        <a href="{{ route('pengajuan-surat.edit', $pengajuan_surat->id) }}"
            class="text-white bg-danger focus:outline-none font-medium text-xs rounded-lg lg:text-sm px-5 py-2.5 text-center ">
            Proses Surat
        </a>
        <a href="{{ route('pengajuan_surat.basah', $pengajuan_surat->id) }}"
            class="text-white bg-danger focus:outline-none font-medium text-xs rounded-lg lg:text-sm px-5 py-2.5 text-center ">
            Proses Surat basah
        </a>
    @endif
            @endcanany
            @canany(['kesra'])
            @if ($pengajuan_surat->status == 'verifikasi' && in_array($pengajuan_surat->jenis_surat, ['Surat Keterangan Domisili Haji','Surat Keterangan Domisili Yayasan']))
            <form class="mt-3 ml-0 lg:ml-3 lg:mt-0" action="{{ route('pengajuan_surat.approve', $pengajuan_surat->id) }}"
                method="post">
                @csrf
                @method('PUT')
                <button type="submit"
                    class="text-dark bg-warning focus:outline-none font-medium text-xs rounded-lg lg:text-sm px-5 py-2.5 text-center ">Setujui
                    & Proses
                    Surat</button>
            </form>
    @endif
            @endcanany
        @endcanany
    </div>

    @if ($pengajuan_surat->jenis_surat == 'Surat Keterangan')
        <div class="bg-white py-6 px-9 mb-5 rounded-lg w-full">
            <div class="overflow-x">
                <table class="w-full mt-10 bg-divide-y overflow-hidden">
                    <tr>
                        <td class="w-[40%] lg:w-[15%] font-bold">
                            Nama
                        </td>
                    </tr>
                    <tr>
                        <td>{{ $surat->nama }} <br> <br></td>

                    </tr>
                    <tr>
                        <td class="w-[40%] lg:w-[15%] font-bold">
                            NIK
                        </td>
                    </tr>
                    <tr>
                        <td>{{ $surat->nik }} <br> <br></td>
                    </tr>
                    <tr>
                        <td class="w-[40%] lg:w-[15%] font-bold">
                            No KK
                        </td>
                    </tr>
                    <tr>
                        <td>{{ $surat->no_kk }} <br> <br></td>
                    </tr>
                    <tr>
                        <td class="w-[40%] lg:w-[15%] font-bold">
                            Tempat tanggal lahir
                        </td>
                    </tr>
                    <tr>
                        <td>{{ $surat->ttl }} <br> <br></td>
                    </tr>
                    <tr>
                        <td class="w-[40%] lg:w-[15%] font-bold">
                            Pekerjaan
                        </td>
                    </tr>
                    <tr>
                        <td>{{ $surat->pekerjaan }} <br> <br></td>
                    </tr>
                    <tr>
                        <td class="w-[40%] lg:w-[15%] font-bold">
                            Alamat
                        </td>
                    </tr>
                    <tr>
                        <td>{{ $surat->alamat }} <br> <br></td>
                    </tr>
                    <tr>
                        <td class="w-[40%] lg:w-[15%] font-bold">
                            Kewarganegaraan & Agama
                        </td>
                    </tr>
                    <tr>
                        <td>{{ $surat->negara_agama }} <br> <br></td>
                    </tr>
                    <tr>
                        <td class="w-[40%] lg:w-[15%] font-bold">
                            Keperluan
                        </td>
                    </tr>
                    <tr>
                        <td>{{ $surat->keperluan }} <br> <br></td>
                    </tr>
                    <tr>
                        <td class="w-[40%] lg:w-[15%] font-bold">
                            Keterangan Surat
                        </td>
                    </tr>
                    <tr>
                        <td>{{ $surat->keterangan_surat }} <br> <br></td>
                    </tr>
                    <tr>
                        <td class="w-[40%] lg:w-[15%] font-bold">
                            Pesan untuk petugas/admin
                        </td>
                    </tr>
                    <tr>
                        <td>{{ $pengajuan_surat->pesan }} <br> <br></td>
                    </tr>
                </table>
            </div>
        </div>
    @endif
    @if ($pengajuan_surat->jenis_surat == 'Surat Keterangan Domisili Haji')
    <div class="bg-white py-6 px-9 mb-5 rounded-lg w-full">
        <div class="overflow-x">
            <table class="w-full mt-10 bg-divide-y overflow-hidden">
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Nama
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->nama }} <br> <br></td>

                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        NIK
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->nik }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        No KK
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->no_kk }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Tempat tanggal lahir
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->ttl }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Pekerjaan
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->pekerjaan }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Alamat
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->alamat }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Kewarganegaraan & Agama
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->negara_agama }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Jenis Kelamin
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->JK }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Status Perkawinan
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->Status_Perkawinan }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Foto KTP
                    </td>
                </tr>
                <tr>
                    <td>
                        @if ($surat->fotoktp)
                            <a href="{{ asset('uploads/' . $surat->fotoktp) }}" data-lightbox="fotoktp">
                                <img src="{{ asset('uploads/' . $surat->fotoktp) }}" alt="Foto KTP" class="max-w-[300px] mx-auto">
                            </a>
                        @else
                            Foto tidak tersedia
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Foto KK
                    </td>
                </tr>
                <tr>
                    <td>
                        @if ($surat->fotokk)
                        <a href="{{asset('uploads/' . $surat->fotokk) }}" data-lightbox="fotokk">
                            <img src="{{ asset('uploads/' . $surat->fotokk) }}" alt="Foto KK" class="max-w-[300px] mx-auto">
                        </a>
                            @else
                            Foto tidak tersedia
                        @endif
                    </td>
                </tr>
        
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Foto Keterangan RT
                    </td>
                </tr>
                <tr>
                    <td>
                        @if ($surat->fotoketeranganrt)
                        <a href="{{asset('uploads/' . $surat->fotoketeranganrt) }}" data-lightbox="fotoketeranganrt">
                            <img src="{{ asset('uploads/' . $surat->fotoketeranganrt) }}" alt="Foto Keterangan RT/RW" class="max-w-[300px] mx-auto">
                        </a>
                            @else
                            Foto tidak tersedia
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Jenis Tanda Tangan
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->kttd }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Pesan untuk petugas/admin
                    </td>
                </tr>
                <tr>
                    <td>{{ $pengajuan_surat->pesan }} <br> <br></td>
                </tr>
            </table>
        </div>
    </div>
@endif
@if ($pengajuan_surat->jenis_surat == 'Surat Keterangan Domisili Yayasan')
    <div class="bg-white py-6 px-9 mb-5 rounded-lg w-full">
        <div class="overflow-x">
            <table class="w-full mt-10 bg-divide-y overflow-hidden">
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Nama Pimpinan
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->nama_pimpinan }} <br> <br></td>

                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        NIK
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->nik }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Jenis Kelamin
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->JK }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Tempat tanggal lahir
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->ttl }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Pekerjaan
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->pekerjaan }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Alamat
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->alamat }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Kewarganegaraan
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->kewarganegaraan }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Alamat
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->alamat }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Nama Yayasan
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->nama_yayasan }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Jenis / Klasifikasi Yayasan
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->jenis_yayasan }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Alamat Yayasan
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->alamat_yayasan }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Akta Pendirian
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->akta_pendirian }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        SK Kemenkumham
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->sk_kemenkumham }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Jumlah Pengurus
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->jumlah_pengurus }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Penanggung Jawab Yayasan
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->penanggung_jawab_yayasan }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Jenis Tanda Tangan
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->kttd }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Pesan untuk petugas/admin
                    </td>
                </tr>
                <tr>
                    <td>{{ $pengajuan_surat->pesan }} <br> <br></td>
                </tr>
            </table>
        </div>
    </div>
@endif
@if ($pengajuan_surat->jenis_surat == 'Surat Keterangan Penguburan')
    <div class="bg-white py-6 px-9 mb-5 rounded-lg w-full">
        <div class="overflow-x">
            <table class="w-full mt-10 bg-divide-y overflow-hidden">
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Nama
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->nama }} <br> <br></td>

                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Tempat tanggal lahir
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->ttl }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        NIK
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->nik }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Jenis Kelamin
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->JK }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Kewarganegaraan
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->kewarganegaraan }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Agama
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->agama }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Status Perkawinan
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->status_perkawinan }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Pekerjaan
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->pekerjaan }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Alamat
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->alamat }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Pada hari/Tanggal
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->hari_tanggal }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Tempat Meniggal
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->tempat_meninggal }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Dikuburkan Hari
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->dikuburkan }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Waktu
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->waktu }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        tempat penguburan
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->tempat_penguburan }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Jenis Tanda Tangan
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->kttd }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Pesan untuk petugas/admin
                    </td>
                </tr>
                <tr>
                    <td>{{ $pengajuan_surat->pesan }} <br> <br></td>
                </tr>
            </table>
        </div>
    </div>
@endif
@if ($pengajuan_surat->jenis_surat == 'Surat Keterangan Tentang Perkawinan')
    <div class="bg-white py-6 px-9 mb-5 rounded-lg w-full">
        <div class="overflow-x">
            <table class="w-full mt-10 bg-divide-y overflow-hidden">
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Nama
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->nama_laki }} <br> <br></td>

                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Tempat tanggal lahir
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->ttl }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Pekerjaan
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->pekerjaan_laki }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Warga Negara
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->warganegara_laki }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Alamat
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->alamat_laki }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Nama
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->nama_perempuan }} <br> <br></td>

                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Tempat tanggal lahir
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->ttl_perempuan }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Pekerjaan
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->pekerjaan_perempuan }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Warga Negara
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->warganegara_perempuan }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Alamat
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->alamat_perempuan }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Jenis Tanda Tangan
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->kttd }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Pesan untuk petugas/admin
                    </td>
                </tr>
                <tr>
                    <td>{{ $pengajuan_surat->pesan }} <br> <br></td>
                </tr>
            </table>
        </div>
    </div>
@endif
@if ($pengajuan_surat->jenis_surat == 'Surat Keterangan Numpang Nikah')
    <div class="bg-white py-6 px-9 mb-5 rounded-lg w-full">
        <div class="overflow-x">
            <table class="w-full mt-10 bg-divide-y overflow-hidden">
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Nama
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->nama }} <br> <br></td>

                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Bin/Binti
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->bin }} <br> <br></td>

                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        NIK
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->nik }} <br> <br></td>

                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Tempat/Tanggal Lahir
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->ttl }} <br> <br></td>

                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Kewarganegaraan
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->kewarganegaraan }} <br> <br></td>

                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Agama
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->agama }} <br> <br></td>

                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Status Perkawinan
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->status_pernikahan }} <br> <br></td>

                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Pekrjaan
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->pekerjaan }} <br> <br></td>

                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Tempat Tinggal
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->tempat_tinggal }} <br> <br></td>

                </tr>

                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Nama
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->nama_perempuan }} <br> <br></td>

                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Bin/Binti
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->bin_perempuan }} <br> <br></td>

                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        NIK
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->nik_perempuan }} <br> <br></td>

                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Tempat/Tanggal Lahir
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->ttl_perempuan }} <br> <br></td>

                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Kewarganegaraan
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->kewarganegaraan_perempuan }} <br> <br></td>

                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Agama
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->agama_perempuan }} <br> <br></td>

                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Status Perkawinan
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->status_pernikahan_perempuan }} <br> <br></td>

                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Pekrjaan
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->pekerjaan_perempuan }} <br> <br></td>

                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Tempat Tinggal
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->tempat_tinggal_perempuan }} <br> <br></td>

                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Jenis Tanda Tangan
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->kttd }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Pesan untuk petugas/admin
                    </td>
                </tr>
                <tr>
                    <td>{{ $pengajuan_surat->pesan }} <br> <br></td>
                </tr>
            </table>
        </div>
    </div>
@endif
@if ($pengajuan_surat->jenis_surat == 'Surat Keterangan Orang Tua Wali')
    <div class="bg-white py-6 px-9 mb-5 rounded-lg w-full">
        <div class="overflow-x">
            <table class="w-full mt-10 bg-divide-y overflow-hidden">
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Nama
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->nama }} <br> <br></td>

                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        NIK
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->nik }} <br> <br></td>

                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Tempat tanggal lahir
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->ttl }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Jenis Kelamin
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->jk }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Kewarganegaraan
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->kewarganegaraan }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Agama
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->agama }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Status Perkawinan
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->status_kawin }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Pekerjaan
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->pekerjaan }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Alamat
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->alamat }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Nama
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->nama_anak }} <br> <br></td>

                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        NIK
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->nik_anak }} <br> <br></td>

                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Tempat tanggal lahir
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->ttl_anak }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Jenis Kelamin
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->jk_anak }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Kewarganegaraan
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->kewarganegaraan_anak }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Agama
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->agama_anak }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Status Perkawinan
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->status_kawin_anak }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Pekerjaan
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->pekerjaan_anak }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Alamat
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->alamat_anak }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Jenis Tanda Tangan
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->kttd }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Pesan untuk petugas/admin
                    </td>
                </tr>
                <tr>
                    <td>{{ $pengajuan_surat->pesan }} <br> <br></td>
                </tr>
            </table>
        </div>
    </div>
@endif
@if ($pengajuan_surat->jenis_surat == 'Surat Keterangan Kehilangan')
    <div class="bg-white py-6 px-9 mb-5 rounded-lg w-full">
        <div class="overflow-x">
            <table class="w-full mt-10 bg-divide-y overflow-hidden">
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Nama
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->nama }} <br> <br></td>

                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Nomor KK/NIK
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->kk_nik }} <br> <br></td>

                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Tempat tanggal lahir
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->ttl }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Jenis Kelamin
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->jk }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Agama
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->agama }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Status Perkawinan
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->status_perkawinan }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Warga Negara
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->warganegara }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Pekerjaan
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->pekerjaan }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Alamat
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->alamat }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Nama Barang
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->nama_barang }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Hari/Tgl. Kehilangan
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->tgl_hilang }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Waktu Hilang
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->waktu_hilang }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Lokasi Hilang
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->lokasi_hilang }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Jenis Tanda Tangan
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->kttd }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Pesan untuk petugas/admin
                    </td>
                </tr>
                <tr>
                    <td>{{ $pengajuan_surat->pesan }} <br> <br></td>
                </tr>
            </table>
        </div>
    </div>
@endif
@if ($pengajuan_surat->jenis_surat == 'Surat Keterangan Belum Nikah')
    <div class="bg-white py-6 px-9 mb-5 rounded-lg w-full">
        <div class="overflow-x">
            <table class="w-full mt-10 bg-divide-y overflow-hidden">
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Nama
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->nama }} <br> <br></td>

                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Nomor KK/NIK
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->kk_nik }} <br> <br></td>

                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Tempat tanggal lahir
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->ttl }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Jenis Kelamin
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->jk }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Agama
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->agama }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Status Perkawinan
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->status_perkawinan }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Pekerjaan
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->pekerjaan }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Pendidikan Trakhir
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->pendidikan_trakhir }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Alamat
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->alamat }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Jenis Tanda Tangan
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->kttd }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Pesan untuk petugas/admin
                    </td>
                </tr>
                <tr>
                    <td>{{ $pengajuan_surat->pesan }} <br> <br></td>
                </tr>
            </table>
        </div>
    </div>
@endif
@if ($pengajuan_surat->jenis_surat == 'Surat Keterangan Tidak Mampu')
    <div class="bg-white py-6 px-9 mb-5 rounded-lg w-full">
        <div class="overflow-x">
            <table class="w-full mt-10 bg-divide-y overflow-hidden">
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Nama
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->nama }} <br> <br></td>

                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Nomor KK/NIK
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->kk_nik }} <br> <br></td>

                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Tempat tanggal lahir
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->ttl }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Jenis Kelamin
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->jk }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Agama
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->agama }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Status Perkawinan
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->status_perkawinan }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Warga Negara
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->warganegara }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Pendidikan
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->pendidikan }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Pendidikan
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->pendidikan }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Pekerjaan
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->pekerjaan }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Nama Ayah/Ibu
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->nama_ayah_ibu }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Alamat Lengkap
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->alamat_lengkap }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Jenis Tanda Tangan
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->kttd }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Pesan untuk petugas/admin
                    </td>
                </tr>
                <tr>
                    <td>{{ $pengajuan_surat->pesan }} <br> <br></td>
                </tr>
            </table>
        </div>
    </div>
@endif
@if ($pengajuan_surat->jenis_surat == 'Surat Keterangan Duda Janda')
    <div class="bg-white py-6 px-9 mb-5 rounded-lg w-full">
        <div class="overflow-x">
            <table class="w-full mt-10 bg-divide-y overflow-hidden">
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Nama
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->nama }} <br> <br></td>

                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Nomor KK/NIK
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->kk_nik }} <br> <br></td>

                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Tempat tanggal lahir
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->ttl }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Jenis Kelamin
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->jk }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Agama
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->agama }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Status Perkawinan
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->status_perkawinan }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Warga Negara
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->warganegara }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Pekerjaan
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->pekerjaan }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Alamat
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->alamat }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Keterangan Status Pernikahan
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->keterangan_status }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Jenis Tanda Tangan
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->kttd }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Pesan untuk petugas/admin
                    </td>
                </tr>
                <tr>
                    <td>{{ $pengajuan_surat->pesan }} <br> <br></td>
                </tr>
            </table>
        </div>
    </div>
@endif
@if ($pengajuan_surat->jenis_surat == 'Surat Keterangan Domisili')
    <div class="bg-white py-6 px-9 mb-5 rounded-lg w-full">
        <div class="overflow-x">
            <table class="w-full mt-10 bg-divide-y overflow-hidden">
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Nama
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->nama }} <br> <br></td>

                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Nomor KK/NIK
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->kk_nik }} <br> <br></td>

                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Tempat tanggal lahir
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->ttl }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Jenis Kelamin
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->jk }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Agama
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->agama }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Status Perkawinan
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->status_perkawinan }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Warga Negara
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->warganegara }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Pendidikan
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->pendidikan }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Pekerjaan
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->pekerjaan }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Alamat
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->alamat }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Jenis Tanda Tangan
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->kttd }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Pesan untuk petugas/admin
                    </td>
                </tr>
                <tr>
                    <td>{{ $pengajuan_surat->pesan }} <br> <br></td>
                </tr>
            </table>
        </div>
    </div>
@endif
@if ($pengajuan_surat->jenis_surat == 'Surat Keterangan Usaha')
    <div class="bg-white py-6 px-9 mb-5 rounded-lg w-full">
        <div class="overflow-x">
            <table class="w-full mt-10 bg-divide-y overflow-hidden">
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Nama
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->nama }} <br> <br></td>

                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Tempat tanggal lahir
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->ttl }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Jenis Kelamin
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->jk }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Warga Negara
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->warganegara }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Status Perkawinan
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->status_perkawinan }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Agama
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->agama }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Pekerjaan
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->pekerjaan }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Nomor KK
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->no_kk }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        NIK
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->nik }} <br> <br></td>

                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Alamat
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->alamat }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Jenis Usaha
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->jenis_usaha }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        lamanya Usaha
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->selama }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Alamat Usaha
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->alamat_usaha }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Keperluan Surat
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->keperluan_surat }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Jenis Tanda Tangan
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->kttd }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Pesan untuk petugas/admin
                    </td>
                </tr>
                <tr>
                    <td>{{ $pengajuan_surat->pesan }} <br> <br></td>
                </tr>
            </table>
        </div>
    </div>
@endif
@if ($pengajuan_surat->jenis_surat == 'Surat Pengantar Keterangan Catatan Kepolisian')
    <div class="bg-white py-6 px-9 mb-5 rounded-lg w-full">
     <div class="overflow-x">
        <table class="w-full mt-10 bg-divide-y overflow-hidden">
            <tr>
                <td class="w-[40%] lg:w-[15%] font-bold">
                    Nama
                </td>
            </tr>
            <tr>
                <td>{{ $surat->nama }} <br> <br></td>

            </tr>
            <tr>
                <td class="w-[40%] lg:w-[15%] font-bold">
                    NIK
                </td>
            </tr>
            <tr>
                <td>{{ $surat->nik }} <br> <br></td>
            </tr>
            <tr>
                <td class="w-[40%] lg:w-[15%] font-bold">
                    Tempat tanggal lahir
                </td>
            </tr>
            <tr>
                <td>{{ $surat->ttl }} <br> <br></td>
            </tr>
            <tr>
                <td class="w-[40%] lg:w-[15%] font-bold">
                    Jenis Kelamin
                </td>
            </tr>
            <tr>
                <td>{{ $surat->jk }} <br> <br></td>
            </tr>
            <tr>
                <td class="w-[40%] lg:w-[15%] font-bold">
                    Agama
                </td>
            </tr>
            <tr>
                <td>{{ $surat->agama }} <br> <br></td>
            </tr>
            <tr>
                <td class="w-[40%] lg:w-[15%] font-bold">
                    Warga Negara
                </td>
            </tr>
            <tr>
                <td>{{ $surat->warganegara }} <br> <br></td>
            </tr>
            <tr>
                <td class="w-[40%] lg:w-[15%] font-bold">
                    Status Perkawinan
                </td>
            </tr>
            <tr>
                <td>{{ $surat->status_perkawinan }} <br> <br></td>
            </tr>
            <tr>
                <td class="w-[40%] lg:w-[15%] font-bold">
                    Pendidikan Trakhir
                </td>
            </tr>
            <tr>
                <td>{{ $surat->pendidikan_trakhir }} <br> <br></td>

            </tr>
            <tr>
                <td class="w-[40%] lg:w-[15%] font-bold">
                    Pekerjaan
                </td>
            </tr>
            <tr>
                <td>{{ $surat->pekerjaan }} <br> <br></td>
            </tr>
            <tr>
                <td class="w-[40%] lg:w-[15%] font-bold">
                    Alamat
                </td>
            </tr>
            <tr>
                <td>{{ $surat->alamat }} <br> <br></td>
            </tr>
            <tr>
                <td class="w-[40%] lg:w-[15%] font-bold">
                    Keperluan Surat
                </td>
            </tr>
            <tr>
                <td>{{ $surat->keperluan }} <br> <br></td>
            </tr>
            <tr>
                <td class="w-[40%] lg:w-[15%] font-bold">
                    Jenis Tanda Tangan
                </td>
            </tr>
            <tr>
                <td>{{ $surat->kttd }} <br> <br></td>
            </tr>
            <tr>
                <td class="w-[40%] lg:w-[15%] font-bold">
                    Pesan untuk petugas/admin
                </td>
            </tr>
            <tr>
                <td>{{ $pengajuan_surat->pesan }} <br> <br></td>
            </tr>
        </table>
    </div>
</div>
@endif
@if ($pengajuan_surat->jenis_surat == 'Surat Pernyataan Akad Nikah')
    <div class="bg-white py-6 px-9 mb-5 rounded-lg w-full">
        <div class="overflow-x">
            <table class="w-full mt-10 bg-divide-y overflow-hidden">
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Nama
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->nama }} <br> <br></td>

                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Tempat tanggal lahir
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->ttl }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Status Pelapor
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->status_pelapor }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Pekerjaan
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->pekerjaan }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Alamat
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->alamat }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Status
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->status }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Telah Mendaftar Di KUA
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->daftar_kua }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Hari Daftar
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->hari_daftar }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Tanggal_daftar
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->tanggal_daftar }} <br> <br></td>

                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Keperluan Surat
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->keperluan }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Nama Wanita
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->nama_wanita }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Nama Pria
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->nama_pria }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        waktu Acara
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->waktu_acara }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Tanggal Acara
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->tanggal_acara }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Alamat Acara
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->alamat_acara }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Jenis Tanda Tangan
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->kttd }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Pesan untuk petugas/admin
                    </td>
                </tr>
                <tr>
                    <td>{{ $pengajuan_surat->pesan }} <br> <br></td>
                </tr>
            </table>
        </div>
    </div>
@endif
@if ($pengajuan_surat->jenis_surat == 'Surat Pernyataan Ahli Waris')
    <div class="bg-white py-6 px-9 mb-5 rounded-lg w-full">
        <div class="overflow-x">
            
            <table class="w-full mt-10 bg-divide-y overflow-hidden">
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Nama
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->nama_almarhum }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Nama
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->nama_pertama }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Tempat tanggal lahir
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->ttl_pertama }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Alamat
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->alamat_pertama }} <br> <br></td>
                </tr>
                @for ($i = 1; $i <= 10; $i++)
                @if (isset($surat->{'nama' . $i}))
                    <tr>
                        <td class="w-[40%] lg:w-[15%] font-bold">
                            Nama Tambahan {{ $i }}
                        </td>
                    </tr>
                    <tr>
                        <td>{{ $surat->{'nama' . $i} }} <br> <br></td>
                    </tr>
                    <tr>
                        <td class="w-[40%] lg:w-[15%] font-bold">
                            Tempat tanggal lahir Tambahan {{ $i }}
                        </td>
                    </tr>
                    <tr>
                        <td>{{ $surat->{'ttl' . $i} }} <br> <br></td>
                    </tr>
                    <tr>
                        <td class="w-[40%] lg:w-[15%] font-bold">
                            Alamat Tambahan {{ $i }}
                        </td>
                    </tr>
                    <tr>
                        <td>{{ $surat->{'alamat' . $i} }} <br> <br></td>
                    </tr>
                @endif
            @endfor
            
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        warisan
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->warisan }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        nama penerima
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->nama_penerima }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        ttl penerima
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->ttl_penerima }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Alamat
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->alamat_penerima }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Jenis Tanda Tangan
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->kttd }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Pesan untuk petugas/admin
                    </td>
                </tr>
                <tr>
                    <td>{{ $pengajuan_surat->pesan }} <br> <br></td>
                </tr>
            </table>
        </div>
    </div>
@endif
@if ($pengajuan_surat->jenis_surat == 'Surat Keterangan Beda Nama Data')
    <div class="bg-white py-6 px-9 mb-5 rounded-lg w-full">
        <div class="overflow-x">
            
            <table class="w-full mt-10 bg-divide-y overflow-hidden">
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Nomor KK
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->kk }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        atas nama kk
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->ankk }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Nama ayah a.n kk
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->ayahkk }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        nama ibu a.n kk
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->ibuKK }} <br> <br></td>
                </tr>
                @for ($i = 1; $i <= 10; $i++)
                @if (isset($surat->{'nama' . $i}))
                    <tr>
                        <td class="w-[40%] lg:w-[15%] font-bold">
                            Nama {{ $i }}
                        </td>
                    </tr>
                    <tr>
                        <td>{{ $surat->{'nama' . $i} }} <br> <br></td>
                    </tr>
                    <tr>
                        <td class="w-[40%] lg:w-[15%] font-bold">
                            nama ayah {{ $i }}
                        </td>
                    </tr>
                    <tr>
                        <td>{{ $surat->{'nama_ayah' . $i} }} <br> <br></td>
                    </tr>
                    <tr>
                        <td class="w-[40%] lg:w-[15%] font-bold">
                            nama ibu {{ $i }}
                        </td>
                    </tr>
                    <tr>
                        <td>{{ $surat->{'nama_ibu' . $i} }} <br> <br></td>
                    </tr>
                @endif
            @endfor
            <tr>
                <td class="w-[40%] lg:w-[15%] font-bold">
                    data yang benar di
                </td>
            </tr>
            <tr>
                <td>{{ $surat->data_benar }} <br> <br></td>
            </tr>
            <tr>
                <td class="w-[40%] lg:w-[15%] font-bold">
                    data atas nama
                </td>
            </tr>
            <tr>
                <td>{{ $surat->atas_nama }} <br> <br></td>
            </tr>
            <tr>
                <td class="w-[40%] lg:w-[15%] font-bold">
                    perbaikan data
                </td>
            </tr>
            <tr>
                <td>{{ $surat->perbaikan_data }} <br> <br></td>
            </tr>
            @for ($i = 1; $i <= 10; $i++)
                @if (isset($surat->{'perbaikan' . $i}))
                    <tr>
                        <td class="w-[40%] lg:w-[15%] font-bold">
                            perbaikan data {{ $i }}
                        </td>
                    </tr>
                    <tr>
                        <td>{{ $surat->{'perbaikan' . $i} }} <br> <br></td>
                    </tr>
                @endif
            @endfor
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Keterangan
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->keterangan }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Jenis Tanda Tangan
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->kttd }} <br> <br></td>
                </tr>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Pesan untuk petugas/admin
                    </td>
                </tr>
                <tr>
                    <td>{{ $pengajuan_surat->pesan }} <br> <br></td>
                </tr>
            </table>
        </div>
    </div>
@endif
    @if ($pengajuan_surat->jenis_surat == 'Surat Kelahiran')
        <div class="bg-white py-6 px-9 mb-5 rounded-lg w-full">
            <div class="flex flex-col lg:flex-row gap-5 justify-center">
                <div class="w-full ">
                    <h1 class="text-2xl text-dark">Informasi Anak</h1>
                    <table class="w-full mt-5 bg-divide-y overflow-hidden">
                        <tr>
                            <td class="w-[40%] lg:w-[15%] font-bold">
                                Hari
                            </td>
                        </tr>
                        <tr>
                            <td>{{ $surat->hari }}<br> <br></td>
                        </tr>
                        <tr>
                            <td class="w-[40%] lg:w-[15%] font-bold">
                                Tanggal
                            </td>
                        </tr>
                        <tr>
                            <td>{{ $surat->tanggal }}<br> <br></td>
                        </tr>
                        <tr>
                            <td class="w-[40%] lg:w-[15%] font-bold">
                                Tempat Kelahiran
                            </td>
                        </tr>
                        <tr>
                            <td>{{ $surat->tempat_lahir }} <br> <br></td>
                        </tr>
                        <tr>
                            <td class="w-[40%] lg:w-[15%] font-bold">
                                Anak Ke
                            </td>
                        </tr>
                        <tr>
                            <td>{{ $surat->anak_ke }} <br> <br></td>
                        </tr>
                        <tr>
                            <td class="w-[40%] lg:w-[15%] font-bold">
                                Nama
                            </td>
                        </tr>
                        <tr>
                            <td>{{ $surat->nama_anak }} <br> <br></td>
                        </tr>
                        <tr>
                            <td class="w-[40%] lg:w-[15%] font-bold">
                                Jenis Kelamin
                            </td>
                        </tr>
                        <tr>
                            <td>{{ $surat->kelamin }} <br> <br></td>
                        </tr>
                    </table>
                </div>
                <div class="w-full ">
                    <h1 class="text-2xl text-dark">Informasi Ibu</h1>
                    <table class="w-full mt-5 bg-divide-y overflow-hidden">
                        <tr>
                            <td class="w-[40%] lg:w-[15%] font-bold">
                                Nama Ibu
                            </td>
                        </tr>
                        <tr>
                            <td>{{ $surat->nama_ibu }} <br> <br></td>
                        </tr>
                        <tr>
                            <td class="w-[40%] lg:w-[15%] font-bold">
                                Umur
                            </td>
                        </tr>
                        <tr>
                            <td>{{ $surat->umur }} <br> <br></td>
                        </tr>
                        <tr>
                            <td class="w-[40%] lg:w-[15%] font-bold">
                                Agama
                            </td>
                        </tr>
                        <tr>
                            <td>{{ $surat->agama }} <br> <br></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="bg-white py-6 px-9 mb-5 rounded-lg w-full">
            <div class="flex flex-col lg:flex-row gap-5 justify-center">
                <div class="w-full ">
                    <h1 class="text-2xl text-dark">Informasi Ayah</h1>
                    <table class="w-full mt-5 bg-divide-y overflow-hidden">
                        <tr>
                            <td class="w-[40%] lg:w-[15%] font-bold">
                                Nama Ayah
                            </td>
                        </tr>
                        <tr>
                            <td>{{ $surat->nama_ayah }} <br> <br></td>
                        </tr>
                        <tr>
                            <td class="w-[40%] lg:w-[15%] font-bold">
                                Umur
                            </td>
                        </tr>
                        <tr>
                            <td>{{ $surat->umur_ayah }} <br> <br></td>
                        </tr>
                        <tr>
                            <td class="w-[40%] lg:w-[15%] font-bold">
                                Agama
                            </td>
                        </tr>
                        <tr>
                            <td>{{ $surat->agama_ayah }} <br> <br></td>
                        </tr>
                        <tr>
                            <td class="w-[40%] lg:w-[15%] font-bold">
                                Pekerjaan
                            </td>
                        </tr>
                        <tr>
                            <td>{{ $surat->pekerjaan_ayah }} <br> <br></td>
                        </tr>
                        
                        <tr>
                            <td class="w-[40%] lg:w-[15%] font-bold">
                                Warga Negara
                            </td>
                        </tr>
                        <tr>
                            <td>{{ $surat->warganegara }} <br> <br></td>
                        </tr>
                        
                        <tr>
                            <td class="w-[40%] lg:w-[15%] font-bold">
                                Alamat
                            </td>
                        </tr>
                        <tr>
                            <td>{{ $surat->alamat }} <br> <br></td>
                        </tr>
                    </table>
                </div>
                <div class="w-full ">
                    <h1 class="text-2xl text-dark">Informasi Pelapor</h1>
                    <table class="w-full mt-5 bg-divide-y overflow-hidden">
                        <tr>
                            <td class="w-[40%] lg:w-[15%] font-bold">
                                Nama Pelapor
                            </td>
                        </tr>
                        <tr>
                            <td>{{ $surat->nama_pelapor }} <br> <br></td>
                        </tr>
                        <tr>
                            <td class="w-[40%] lg:w-[15%] font-bold">
                                Hubungan pelapor dengan anak
                            </td>
                        </tr>
                        <tr>
                            <td>{{ $surat->hub_pelapor_anak }} <br> <br></td>
                        </tr>
                        <tr>
                            <td class="w-[40%] lg:w-[15%] font-bold">
                                Jenis Tanda Tangan
                            </td>
                        </tr>
                        <tr>
                            <td>{{ $surat->kttd }} <br> <br></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="bg-white py-6 px-9 mb-5 rounded-lg w-full">
            <div class="overflow-x">
                <table class="w-full mt-10 bg-divide-y overflow-hidden">

                    <tr>
                        <td class="w-[40%] lg:w-[15%] font-bold">
                            Pesan untuk petugas/admin
                        </td>
                    </tr>
                    <tr>
                        <td>{{ $pengajuan_surat->pesan }} <br> <br></td>
                    </tr>
                </table>
            </div>
        </div>
    @endif

    @if ($pengajuan_surat->jenis_surat == 'Surat Kematian')
        <div class="bg-white py-6 px-9 mb-5 rounded-lg w-full">
            <div class="flex flex-col lg:flex-row gap-5 justify-center">
                <div class="w-full ">
                    <h1 class="text-2xl text-dark">Informasi Almarhum</h1>
                    <table class="w-full mt-5 bg-divide-y overflow-hidden">
                        <tr>
                            <td class="w-[40%] lg:w-[15%] font-bold">
                                Nama
                            </td>
                        </tr>
                        <tr>
                            <td>{{ $surat->nama }} <br> <br></td>
                        </tr>
                        <tr>
                            <td class="w-[40%] lg:w-[15%] font-bold">
                                NIK
                            </td>
                        </tr>
                        <tr>
                            <td>{{ $surat->nik }} <br> <br></td>
                        </tr>
                        <tr>
                            <td class="w-[40%] lg:w-[15%] font-bold">
                                Jenis Kelamin
                            </td>
                        </tr>
                        <tr>
                            <td>{{ $surat->kelamin }} <br> <br></td>
                        </tr>
                        <tr>
                            <td class="w-[40%] lg:w-[15%] font-bold">
                                Umur
                            </td>
                        </tr>
                        <tr>
                            <td>{{ $surat->umur }} <br> <br></td>
                        </tr>
                        <tr>
                            <td class="w-[40%] lg:w-[15%] font-bold">
                                Pekerjaan
                            </td>
                        </tr>
                        <tr>
                            <td>{{ $surat->pekerjaan }} <br> <br></td>
                        </tr>
                        <tr>
                            <td class="w-[40%] lg:w-[15%] font-bold">
                                Alamat
                            </td>
                        </tr>
                        <tr>
                            <td>{{ $surat->alamat }} <br> <br></td>
                        </tr>
                        <tr>
                            <td class="w-[40%] lg:w-[15%] font-bold">
                                Hari
                            </td>
                        </tr>
                        <tr>
                            <td>{{ $surat->hari_meninggal }} <br> <br></td>
                        </tr>
                        <tr>
                            <td class="w-[40%] lg:w-[15%] font-bold">
                                Tanggal Meninggal
                            </td>
                        </tr>
                        <tr>
                            <td>{{$surat->tanggal_meninggal}} <br> <br>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-[40%] lg:w-[15%] font-bold">
                                Tempat Meninggal
                            </td>
                        </tr>
                        <tr>
                            <td>{{ $surat->tempat_meninggal }} <br> <br></td>
                        </tr>
                        <tr>
                            <td class="w-[40%] lg:w-[15%] font-bold">
                                Disebabkan Karena
                            </td>
                        </tr>
                        <tr>
                            <td>{{ $surat->meninggal_karena }} <br> <br></td>
                        </tr>
                    </table>
                </div>
                <div class="w-full ">
                    <h1 class="text-2xl text-dark">Informasi Pelapor</h1>
                    <table class="w-full mt-5 bg-divide-y overflow-hidden">
                        <tr>
                            <td class="w-[40%] lg:w-[15%] font-bold">
                                Nama Pelapor
                            </td>
                        </tr>
                        <tr>
                            <td>{{ $surat->nama_pelapor }} <br> <br></td>
                        </tr>
                        <tr>
                            <td class="w-[40%] lg:w-[15%] font-bold">
                                NIK Pelapor
                            </td>
                        </tr>
                        <tr>
                            <td>{{ $surat->nik_pelapor }} <br> <br></td>
                        </tr>
                        <tr>
                            <td class="w-[40%] lg:w-[15%] font-bold">
                                Hubungan pelapor dengan Almarhum / Almarhumah
                            </td>
                        </tr>
                        <tr>
                            <td>{{ $surat->hub_pelapor_almarhum }} <br> <br></td>
                        </tr>
                        <tr>
                            <td class="w-[40%] lg:w-[15%] font-bold">
                                Jenis Tanda Tangan
                            </td>
                        </tr>
                        <tr>
                            <td>{{ $surat->kttd }} <br> <br></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

         <div class="bg-white py-6 px-9 mb-5 rounded-lg w-full">
            <div class="overflow-x">
                <table class="w-full bg-divide-y overflow-hidden">

                    <tr>
                        <td class="w-[40%] lg:w-[15%] font-bold">
                            Pesan untuk petugas/admin
                        </td>
                    </tr>
                    <tr>
                        <td>{{ $pengajuan_surat->pesan }} <br> <br></td>
                    </tr>
                </table>
            </div>
        </div>
    @endif
@endsection
