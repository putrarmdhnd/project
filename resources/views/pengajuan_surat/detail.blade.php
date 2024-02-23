@extends('templates/dashboard')
@section('content')
@php
$surat = json_decode($pengajuan_surat->surat);
@endphp
<div class="bg-white py-4 px-9 mb-5 rounded-lg row items-center">
    <div class="layout__Konfirmasi--Desktop col-6 text-center lg:text-left">
        <h1 class="text-lg lg:text-2xl text-danger font-semibold mb-2"><b>Konfirmasi</b> Pengajuan Surat</h1>
        <p class="textDashboard text-base text-[13px] lg:text-lg font-normal text-secondary">*Konfirmasi petugas terhadap surat yang akan di buat</p>
        @canany(['admin'])
        <p class="text-base text-[13px] lg:text-lg font-normal text-secondary">Jenis Surat : {{ $surat->kttd }}</p>
        @endcanany
    </div>
    <div class="layout__Konfirmasi--Desktop col-6">
        <div class="mt-4 flex justify-center text-center gap-1">
            @canany(['admin', 'petugas','kesra','pelayanan','pemerintahan'])
            @if ($pengajuan_surat->status == 'Pending')

            <form action="{{ route('pengajuan_surat.reject', $pengajuan_surat->id) }}" method="post">
                @csrf
                @method('PUT')
                <button type="submit" class="text-white bg-danger focus:outline-none font-medium text-xs rounded-lg lg:text-sm px-5 py-2.5 text-center">Tolak</button>
            </form>
            <form class="mt-0 ml-0 lg:ml-3 lg:mt-0" action="{{ route('pengajuan_surat.verifikasi', $pengajuan_surat->id) }}" method="post">
                @csrf
                @method('PUT')
                <button type="submit" class="text-dark bg-warning focus:outline-none font-medium text-xs rounded-lg lg:text-sm px-5 py-2.5 text-center ">Verifikasi</button>
            </form>

            @endif
            @endcanany

            @canany(['admin'])

            @if ($pengajuan_surat->status == 'Diproses')

                @if ($surat->kttd == 'basah')
                <a href="{{ route('pengajuan-surat.edit', $pengajuan_surat->id) }}" class="text-white bg-success focus:outline-none font-medium text-xs rounded-lg lg:text-sm px-5 py-2.5 text-center ">
                    Proses Surat
                </a>
                @endif

                @if ($surat->kttd == 'barcode')
                <a href="{{ route('pengajuan_surat.basah', $pengajuan_surat->id) }}" class="text-white bg-success focus:outline-none font-medium text-xs rounded-lg lg:text-sm px-5 py-2.5 text-center ">
                    Proses Surat basah
                </a>
                @endif
            @endif

            @endcanany
            
            @canany(['kesra'])
            @if ($pengajuan_surat->status == 'verifikasi' && in_array($pengajuan_surat->jenis_surat, ['Surat Keterangan Numpang Nikah','Surat Keterangan Duda Janda','Surat Keterangan Tentang Perkawinan','Surat Keterangan Tidak Mampu']))
            <form class="mt-3 ml-0 lg:ml-3 lg:mt-0" action="{{ route('pengajuan_surat.approve', $pengajuan_surat->id) }}" method="post">
                @csrf
                @method('PUT')
                <button type="submit" class="text-dark bg-warning focus:outline-none font-medium text-xs rounded-lg lg:text-sm px-5 py-2.5 text-center ">Setujui
                    & Proses
                    Surat</button>
            </form>
            @endif
            @endcanany
            @canany(['pelayanan'])
            @if ($pengajuan_surat->status == 'verifikasi' && in_array($pengajuan_surat->jenis_surat, ['Surat Keterangan Usaha']))
            <form class="mt-3 ml-0 lg:ml-3 lg:mt-0" action="{{ route('pengajuan_surat.approve', $pengajuan_surat->id) }}" method="post">
                @csrf
                @method('PUT')
                <button type="submit" class="text-dark bg-warning focus:outline-none font-medium text-xs rounded-lg lg:text-sm px-5 py-2.5 text-center ">Setujui
                    & Proses
                    Surat</button>
            </form>
            @endif
            @endcanany
            @canany(['pemerintahan'])
            @if ($pengajuan_surat->status == 'verifikasi' && in_array($pengajuan_surat->jenis_surat, ['Surat Keterangan Domisili Haji','Surat Keterangan Domisili Yayasan','Surat Keterangan Pindah WNI','Surat Keterangan Beda Nama Data','Surat Pengantar Pembuatan Kartu Keluarga','Surat Kematian','Surat Kelahiran','Surat Keterangan Penguburan']))
            <form class="mt-3 ml-0 lg:ml-3 lg:mt-0" action="{{ route('pengajuan_surat.approve', $pengajuan_surat->id) }}" method="post">
                @csrf
                @method('PUT')
                <button type="submit" class="text-dark bg-warning focus:outline-none font-medium text-xs rounded-lg lg:text-sm px-5 py-2.5 text-center ">Setujui
                    & Proses
                    Surat</button>
            </form>
            @endif
            @endcanany
        </div>
    </div>
</div>

<div class="bg-white py-6 px-9 mb-5 rounded-lg w-full">
    <div class="overflow-x">
        <div class="layout__detail__surat card border-0">
            <div class="layout__headSurat py-3">
                <h2 class="text-center text__jenisSurat h2 fw-bold">{{ $pengajuan_surat->jenis_surat }}</h2>
            </div>
            <div class="layout__bodySurat row m-2">
                @if ($pengajuan_surat->jenis_surat == 'Surat Keterangan')

                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="nama">Nama</label>
                        <input type="text" class="form-control my-1" name="nama" id="nama" value="{{ $surat->nama }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="nik">NIK</label>
                        <input type="text" class="form-control my-1" name="nik" id="nik" value="{{ $surat->nik }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="no_kk">No Kartu Keluarga</label>
                        <input type="text" class="form-control my-1" name="no_kk" id="no_kk" value="{{ $surat->no_kk }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl">Tempat, Tanggal Lahir</label>
                        <input type="text" class="form-control my-1" name="ttl" id="ttl" value="{{ $surat->ttl }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="no_kk">Pekerjaan</label>
                        <input type="text" class="form-control my-1" name="pekerjaan" id="pekerjaan" value="{{ $surat->pekerjaan }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl">Alamat</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->alamat}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="negara_agama">Kewarganegaraan & Agama</label>
                        <input type="text" class="form-control my-1" name="negara_agama" id="negara_agama" value="{{ $surat->negara_agama}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="jk">Keperluan</label>
                        <input type="text" class="form-control my-1" name="keperluan" id="keperluan" value="{{ $surat->keperluan}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="jk">Keterangan Surat</label>
                        <input type="text" class="form-control my-1" name="keterangan_surat" id="keterangan_surat" value="{{ $surat->keterangan_surat}}" readonly />
                    </div>
                </div>


                @endif
                @if ($pengajuan_surat->jenis_surat == 'Surat Keterangan Domisili Haji')


                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="nama">Nama</label>
                        <input type="text" class="form-control my-1" name="nama" id="nama" value="{{ $surat->nama }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="nik">NIK</label>
                        <input type="text" class="form-control my-1" name="nik" id="nik" value="{{ $surat->nik }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="no_kk">No Kartu Keluarga</label>
                        <input type="text" class="form-control my-1" name="no_kk" id="no_kk" value="{{ $surat->no_kk }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl">Tempat, Tanggal Lahir</label>
                        <input type="text" class="form-control my-1" name="ttl" id="ttl" value="{{ $surat->ttl }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="no_kk">Pekerjaan</label>
                        <input type="text" class="form-control my-1" name="pekerjaan" id="pekerjaan" value="{{ $surat->pekerjaan }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl">Alamat</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->alamat}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="negara_agama">Kewarganegaraan & Agama</label>
                        <input type="text" class="form-control my-1" name="negara_agama" id="negara_agama" value="{{ $surat->negara_agama}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="jk">Jenis Kelamin</label>
                        <input type="text" class="form-control my-1" name="jk" id="jk" value="{{ $surat->JK}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="status_perkawinan">Status Perkawinan</label>
                        <input type="text" class="form-control my-1" name="status_perkawinan" id="status_perkawinan" value="{{ $surat->status_Perkawinan}}" readonly />
                    </div>
                </div>

                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Jenis Tanda Tangan
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->kttd }} <br> <br></td>
                </tr>
                @endif

                @if ($pengajuan_surat->jenis_surat == 'Surat Keterangan Domisili Yayasan')


                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="status_perkawinan">Nama Pimpinan</label>
                        <input type="text" class="form-control my-1" name="status_perkawinan" id="nama_pimpinan" value="{{ $surat->nama_pimpinan}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="nik">NIK</label>
                        <input type="text" class="form-control my-1" name="nik" id="nik" value="{{ $surat->nik }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="jk">Jenis Kelamin</label>
                        <input type="text" class="form-control my-1" name="jk" id="jk" value="{{ $surat->JK}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl">Tempat, Tanggal Lahir</label>
                        <input type="text" class="form-control my-1" name="ttl" id="ttl" value="{{ $surat->ttl }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="no_kk">Pekerjaan</label>
                        <input type="text" class="form-control my-1" name="pekerjaan" id="pekerjaan" value="{{ $surat->pekerjaan }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl">Alamat</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->alamat}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="status_perkawinan">Kewarganegaraan</label>
                        <input type="text" class="form-control my-1" name="kewarganegaraan" id="kewarganegaraan" value="{{ $surat->kewarganegaraan}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl">Alamat</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->alamat}}" readonly />
                    </div>
                </div>
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



                @endif
                @if ($pengajuan_surat->jenis_surat == 'Surat Keterangan Penguburan')


                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="nama">Nama</label>
                        <input type="text" class="form-control my-1" name="nama" id="nama" value="{{ $surat->nama }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl">Tempat, Tanggal Lahir</label>
                        <input type="text" class="form-control my-1" name="ttl" id="ttl" value="{{ $surat->ttl }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="nik">NIK</label>
                        <input type="text" class="form-control my-1" name="nik" id="nik" value="{{ $surat->nik }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="jk">Jenis Kelamin</label>
                        <input type="text" class="form-control my-1" name="jk" id="jk" value="{{ $surat->JK}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="status_perkawinan">Kewarganegaraan</label>
                        <input type="text" class="form-control my-1" name="kewarganegaraan" id="kewarganegaraan" value="{{ $surat->kewarganegaraan}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="status_perkawinan">Agama</label>
                        <input type="text" class="form-control my-1" name="agama" id="agama" value="{{ $surat->agama}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="status_perkawinan">Status Perkawinan</label>
                        <input type="text" class="form-control my-1" name="status_perkawinan" id="status_perkawinan" value="{{ $surat->status_Perkawinan}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="no_kk">Pekerjaan</label>
                        <input type="text" class="form-control my-1" name="pekerjaan" id="pekerjaan" value="{{ $surat->pekerjaan }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl">Alamat</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->alamat}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="jk"> Pada hari/Tanggal</label>
                        <input type="text" class="form-control my-1" name="jk" id="jk" value="{{ $surat->hari_tanggal }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="jk"> Tempat Meniggal </label>
                        <input type="text" class="form-control my-1" name="jk" id="jk" value="{{ $surat->tempat_meninggal }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="jk"> Dikuburkan Hari </label>
                        <input type="text" class="form-control my-1" name="jk" id="jk" value="{{ $surat->dikuburkan }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="jk"> Waktu </label>
                        <input type="text" class="form-control my-1" name="jk" id="jk" value="{{ $surat->waktu }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="jk"> Tempat Penguburan </label>
                        <input type="text" class="form-control my-1" name="jk" id="jk" value="{{ $surat->tempat_penguburan }}" readonly />
                    </div>
                </div>

                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Jenis Tanda Tangan
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->kttd }} <br> <br></td>
                </tr>



                @endif
                @if ($pengajuan_surat->jenis_surat == 'Surat Keterangan Tentang Perkawinan')


                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="jk"> Nama </label>
                        <input type="text" class="form-control my-1" name="jk" id="jk" value="{{ $surat->nama_laki }}" readonly />
                    </div>
                </div>

                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl">Tempat, Tanggal Lahir</label>
                        <input type="text" class="form-control my-1" name="ttl" id="ttl" value="{{ $surat->ttl }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="jk"> Pekerjaan</label>
                        <input type="text" class="form-control my-1" name="jk" id="jk" value="{{ $surat->pekerjaan_laki }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="jk"> Warga Negara</label>
                        <input type="text" class="form-control my-1" name="jk" id="jk" value="{{ $surat->warganegara_laki }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="jk"> Alamat</label>
                        <input type="text" class="form-control my-1" name="jk" id="jk" value="{{ $surat->alamat_laki}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="jk"> Nama</label>
                        <input type="text" class="form-control my-1" name="jk" id="jk" value="{{ $surat->nama_perempuan }}" readonly />
                    </div>
                </div>
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



                @endif
                @if ($pengajuan_surat->jenis_surat == 'Surat Keterangan Numpang Nikah')


                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="nama">Nama</label>
                        <input type="text" class="form-control my-1" name="nama" id="nama" value="{{ $surat->nama }}" readonly />
                    </div>
                </div>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Bin/Binti
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->bin }} <br> <br></td>

                </tr>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="nik">NIK</label>
                        <input type="text" class="form-control my-1" name="nik" id="nik" value="{{ $surat->nik }}" readonly />
                    </div>
                </div>
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

                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="jk"> Nama</label>
                        <input type="text" class="form-control my-1" name="jk" id="jk" value="{{ $surat->nama_perempuan }}" readonly />
                    </div>
                </div>
                <tr>
                    <div class="col-md-6 my-2">
                        <div class="form-group">
                            <label class="fw-bold" for="jk"> Bin/Binti</label>
                            <input type="text" class="form-control my-1" name="jk" id="jk" value="{{ $surat->bin_perempuan }}" readonly />
                        </div>
                    </div>
                    <div class="col-md-6 my-2">
                        <div class="form-group">
                            <label class="fw-bold" for="jk"> NIK</label>
                            <input type="text" class="form-control my-1" name="jk" id="jk" value="{{ $surat->nik_perempuan }}" readonly />
                        </div>
                    </div>
                <tr>
                    <div class="col-md-6 my-2">
                        <div class="form-group">
                            <label class="fw-bold" for="jk"> Tempat/Tanggal Lahir</label>
                            <input type="text" class="form-control my-1" name="jk" id="jk" value="{{ $surat->ttl_perempuan }}" readonly />
                        </div>
                    </div>
                    <div class="col-md-6 my-2">
                        <div class="form-group">
                            <label class="fw-bold" for="jk"> Kewarganegaraan</label>
                            <input type="text" class="form-control my-1" name="jk" id="jk" value="{{ $surat->kewarganegaraan_perempuan }}" readonly />
                        </div>
                    </div>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Agama
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->agama_perempuan }} <br> <br></td>

                </tr>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="jk"> Status Perkawinan</label>
                        <input type="text" class="form-control my-1" name="jk" id="jk" value="{{ $surat->status_pernikahan_perempuan  }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="jk"> Pekerjaan </label>
                        <input type="text" class="form-control my-1" name="jk" id="jk" value="{{ $surat->pekerjaan_perempuan }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="jk"> Tempat Tinggal </label>
                        <input type="text" class="form-control my-1" name="jk" id="jk" value="{{ $surat->tempat_tinggal_perempuan  }}" readonly />
                    </div>
                </div>

                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Jenis Tanda Tangan
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->kttd }} <br> <br></td>
                </tr>



                @endif
                @if ($pengajuan_surat->jenis_surat == 'Surat Keterangan Orang Tua Wali')


                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="nama">Nama</label>
                        <input type="text" class="form-control my-1" name="nama" id="nama" value="{{ $surat->nama }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="nik">NIK</label>
                        <input type="text" class="form-control my-1" name="nik" id="nik" value="{{ $surat->nik }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl">Tempat, Tanggal Lahir</label>
                        <input type="text" class="form-control my-1" name="ttl" id="ttl" value="{{ $surat->ttl }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="jk">Jenis Kelamin</label>
                        <input type="text" class="form-control my-1" name="jk" id="jk" value="{{ $surat->JK}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="kewarganegaraan">Kewarganegaraan</label>
                        <input type="text" class="form-control my-1" name="kewarganegaraan" id="kewarganegaraan" value="{{ $surat->kewarganegaraan}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="agama">Agama</label>
                        <input type="text" class="form-control my-1" name="agama" id="agama" value="{{ $surat->agama}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="status_kawin">Status Kawin</label>
                        <input type="text" class="form-control my-1" name="status_kawin" id="status_kawin" value="{{ $surat->status_kawin}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="no_kk">Pekerjaan</label>
                        <input type="text" class="form-control my-1" name="pekerjaan" id="pekerjaan" value="{{ $surat->pekerjaan }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl">Alamat</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->alamat}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="status_kawin">Nama</label>
                        <input type="text" class="form-control my-1" name="nama_anak" id="nama_anak" value="{{ $surat->nama_anak}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="status_kawin">NIK</label>
                        <input type="text" class="form-control my-1" name="nik_anak" id="nik_anak" value="{{ $surat->nik_anak}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="status_kawin">Tempat, Tanggal Lahir</label>
                        <input type="text" class="form-control my-1" name="ttl_anak" id="ttl_anak" value="{{ $surat->ttl_anak}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="status_kawin">Jenis Kelamin</label>
                        <input type="text" class="form-control my-1" name="jk_anak" id="jk_anak" value="{{ $surat->jk_anak}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="status_kawin">Kewarganegaraan</label>
                        <input type="text" class="form-control my-1" name="kewarganegaraan_anak" id="kewarganegaraan_anak" value="{{ $surat->kewarganegaraan_anak}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="status_kawin">Agama</label>
                        <input type="text" class="form-control my-1" name="agama_anak" id="agama_anak" value="{{ $surat->agama_anak}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="status_kawin">Status Perkawinan</label>
                        <input type="text" class="form-control my-1" name="agama_anak" id="agama_anak" value="{{ $surat->status_kawin_anak}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="status_kawin">Pekerjaan</label>
                        <input type="text" class="form-control my-1" name="agama_anak" id="agama_anak" value="{{ $surat->pekerjaan_anak}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="status_kawin">Alamat</label>
                        <input type="text" class="form-control my-1" name="agama_anak" id="agama_anak" value="{{ $surat->alamat_anak}}" readonly />
                    </div>
                </div>

                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Jenis Tanda Tangan
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->kttd }} <br> <br></td>
                </tr>



                @endif
                @if ($pengajuan_surat->jenis_surat == 'Surat Keterangan Kehilangan')


                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="nama">Nama</label>
                        <input type="text" class="form-control my-1" name="nama" id="nama" value="{{ $surat->nama }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="status_kawin">Nomor KK/NIK </label>
                        <input type="text" class="form-control my-1" name="agama_anak" id="agama_anak" value="{{ $surat->kk_nik}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl">Tempat, Tanggal Lahir</label>
                        <input type="text" class="form-control my-1" name="ttl" id="ttl" value="{{ $surat->ttl }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="jk">Jenis Kelamin</label>
                        <input type="text" class="form-control my-1" name="jk" id="jk" value="{{ $surat->JK}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="status_perkawinan">Agama</label>
                        <input type="text" class="form-control my-1" name="agama" id="agama" value="{{ $surat->agama}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="status_perkawinan">Status Perkawinan</label>
                        <input type="text" class="form-control my-1" name="status_perkawinan" id="status_perkawinan" value="{{ $surat->status_Perkawinan}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="status_kawin">Warga Negara</label>
                        <input type="text" class="form-control my-1" name="agama_anak" id="agama_anak" value="{{ $surat->warganegara}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="no_kk">Pekerjaan</label>
                        <input type="text" class="form-control my-1" name="pekerjaan" id="pekerjaan" value="{{ $surat->pekerjaan }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl">Alamat</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->alamat}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="jk"> Nama Barang </label>
                        <input type="text" class="form-control my-1" name="jk" id="jk" value="{{ $surat->nama_barang }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="jk"> Hari/Tgl. Kehilangan </label>
                        <input type="text" class="form-control my-1" name="jk" id="jk" value="{{ $surat->tgl_hilang}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="jk"> Waktu Hilang </label>
                        <input type="text" class="form-control my-1" name="jk" id="jk" value="{{ $surat->waktu_hilang }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="jk"> Lokasi Hilang </label>
                        <input type="text" class="form-control my-1" name="jk" id="jk" value="{{ $surat->lokasi_hilang }}" readonly />
                    </div>
                </div>
                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Jenis Tanda Tangan
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->kttd }} <br> <br></td>
                </tr>



                @endif
                @if ($pengajuan_surat->jenis_surat == 'Surat Keterangan Belum Nikah')


                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="nama">Nama</label>
                        <input type="text" class="form-control my-1" name="nama" id="nama" value="{{ $surat->nama }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="status_kawin">Nomor KK/NIK </label>
                        <input type="text" class="form-control my-1" name="agama_anak" id="agama_anak" value="{{ $surat->kk_nik}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl">Tempat, Tanggal Lahir</label>
                        <input type="text" class="form-control my-1" name="ttl" id="ttl" value="{{ $surat->ttl }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="jk">Jenis Kelamin</label>
                        <input type="text" class="form-control my-1" name="jk" id="jk" value="{{ $surat->JK}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="status_perkawinan">Agama</label>
                        <input type="text" class="form-control my-1" name="agama" id="agama" value="{{ $surat->agama}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="status_perkawinan">Status Perkawinan</label>
                        <input type="text" class="form-control my-1" name="status_perkawinan" id="status_perkawinan" value="{{ $surat->status_Perkawinan}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="no_kk">Pekerjaan</label>
                        <input type="text" class="form-control my-1" name="pekerjaan" id="pekerjaan" value="{{ $surat->pekerjaan }}" readonly />
                    </div>
                </div>
                <tr>
                    <div class="col-md-6 my-2">
                        <div class="form-group">
                            <label class="fw-bold" for="status_kawin">Pendidikan Terakhir </label>
                            <input type="text" class="form-control my-1" name="agama_anak" id="agama_anak" value="{{ $surat->pendidikan_trakhir}}" readonly />
                        </div>
                    </div>
                    <div class="col-md-6 my-2">
                        <div class="form-group">
                            <label class="fw-bold" for="ttl">Alamat</label>
                            <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->alamat}}" readonly />
                        </div>
                    </div>

                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Jenis Tanda Tangan
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->kttd }} <br> <br></td>
                </tr>



                @endif
                @if ($pengajuan_surat->jenis_surat == 'Surat Keterangan Tidak Mampu')

                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="nama">Nama</label>
                        <input type="text" class="form-control my-1" name="nama" id="nama" value="{{ $surat->nama }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="nama">Nomor KK/NIK</label>
                        <input type="text" class="form-control my-1" name="nama" id="nama" value="{{ $surat->kk_nik }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="nama">Tempat tanggal lahir</label>
                        <input type="text" class="form-control my-1" name="nama" id="nama" value="{{ $surat->ttl }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="nama">Jenis Kelamin</label>
                        <input type="text" class="form-control my-1" name="nama" id="nama" value="{{ $surat->jk }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="nama">Agama</label>
                        <input type="text" class="form-control my-1" name="nama" id="nama" value="{{ $surat->agama }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="nama">Status Perkawinan</label>
                        <input type="text" class="form-control my-1" name="nama" id="nama" value="{{ $surat->status_Perkawinan }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="nama">Warga Negara</label>
                        <input type="text" class="form-control my-1" name="nama" id="nama" value="{{ $surat->warganegara }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="nama">Pendidikan</label>
                        <input type="text" class="form-control my-1" name="nama" id="nama" value="{{ $surat->pendidikan }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="nama">Pekerjaan</label>
                        <input type="text" class="form-control my-1" name="nama" id="nama" value="{{ $surat->pekerjaan }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="nama">Nama Ayah/Ibu</label>
                        <input type="text" class="form-control my-1" name="nama" id="nama" value="{{ $surat->nama_ayah_ibu }}" readonly />
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="fw-bold" for="nama">Alamat Lengkap</label>
                        <input type="text" class="form-control my-1" name="nama" id="nama" value="{{ $surat->alamat_lengkap }}" readonly />
                    </div>
                </div>

                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="nama">Jenis Tanda tangan</label>
                        <input type="text" class="form-control my-1" name="nama" id="nama" value="{{ $surat->kttd }}" readonly />
                    </div>
                </div>


                @endif
                @if ($pengajuan_surat->jenis_surat == 'Surat Keterangan Duda Janda')


                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="nama">Nama</label>
                        <input type="text" class="form-control my-1" name="nama" id="nama" value="{{ $surat->nama }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="status_kawin">Nomor KK/NIK </label>
                        <input type="text" class="form-control my-1" name="agama_anak" id="agama_anak" value="{{ $surat->kk_nik}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl">Tempat, Tanggal Lahir</label>
                        <input type="text" class="form-control my-1" name="ttl" id="ttl" value="{{ $surat->ttl }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="jk">Jenis Kelamin</label>
                        <input type="text" class="form-control my-1" name="jk" id="jk" value="{{ $surat->JK}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="status_perkawinan">Agama</label>
                        <input type="text" class="form-control my-1" name="agama" id="agama" value="{{ $surat->agama}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="status_perkawinan">Status Perkawinan</label>
                        <input type="text" class="form-control my-1" name="status_perkawinan" id="status_perkawinan" value="{{ $surat->status_Perkawinan}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="status_kawin">Warga Negara</label>
                        <input type="text" class="form-control my-1" name="agama_anak" id="agama_anak" value="{{ $surat->warganegara}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="no_kk">Pekerjaan</label>
                        <input type="text" class="form-control my-1" name="pekerjaan" id="pekerjaan" value="{{ $surat->pekerjaan }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl">Alamat</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->alamat}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="jk"> Keterangan Status Pernikahan </label>
                        <input type="text" class="form-control my-1" name="jk" id="jk" value="{{ $surat->keterangan_status }}" readonly />
                    </div>
                </div>

                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Jenis Tanda Tangan
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->kttd }} <br> <br></td>
                </tr>



                @endif
                @if ($pengajuan_surat->jenis_surat == 'Surat Keterangan Domisili')


                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="nama">Nama</label>
                        <input type="text" class="form-control my-1" name="nama" id="nama" value="{{ $surat->nama }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="status_kawin">Nomor KK/NIK </label>
                        <input type="text" class="form-control my-1" name="agama_anak" id="agama_anak" value="{{ $surat->kk_nik}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl">Tempat, Tanggal Lahir</label>
                        <input type="text" class="form-control my-1" name="ttl" id="ttl" value="{{ $surat->ttl }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="jk">Jenis Kelamin</label>
                        <input type="text" class="form-control my-1" name="jk" id="jk" value="{{ $surat->JK}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="status_perkawinan">Agama</label>
                        <input type="text" class="form-control my-1" name="agama" id="agama" value="{{ $surat->agama}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="status_perkawinan">Status Perkawinan</label>
                        <input type="text" class="form-control my-1" name="status_perkawinan" id="status_perkawinan" value="{{ $surat->status_Perkawinan}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="status_kawin">Warga Negara</label>
                        <input type="text" class="form-control my-1" name="agama_anak" id="agama_anak" value="{{ $surat->warganegara}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="status_kawin">Pendidikan</label>
                        <input type="text" class="form-control my-1" name="agama_anak" id="agama_anak" value="{{ $surat->pendidikan}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="no_kk">Pekerjaan</label>
                        <input type="text" class="form-control my-1" name="pekerjaan" id="pekerjaan" value="{{ $surat->pekerjaan }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl">Alamat</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->alamat}}" readonly />
                    </div>
                </div>

                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Jenis Tanda Tangan
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->kttd }} <br> <br></td>
                </tr>



                @endif
                @if ($pengajuan_surat->jenis_surat == 'Surat Keterangan Usaha')


                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="nama">Nama</label>
                        <input type="text" class="form-control my-1" name="nama" id="nama" value="{{ $surat->nama }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl">Tempat, Tanggal Lahir</label>
                        <input type="text" class="form-control my-1" name="ttl" id="ttl" value="{{ $surat->ttl }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="jk">Jenis Kelamin</label>
                        <input type="text" class="form-control my-1" name="jk" id="jk" value="{{ $surat->JK}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="status_kawin">Warga Negara</label>
                        <input type="text" class="form-control my-1" name="agama_anak" id="agama_anak" value="{{ $surat->warganegara}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="status_perkawinan">Status Perkawinan</label>
                        <input type="text" class="form-control my-1" name="status_perkawinan" id="status_perkawinan" value="{{ $surat->status_Perkawinan}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="status_perkawinan">Agama</label>
                        <input type="text" class="form-control my-1" name="agama" id="agama" value="{{ $surat->agama}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="no_kk">Pekerjaan</label>
                        <input type="text" class="form-control my-1" name="pekerjaan" id="pekerjaan" value="{{ $surat->pekerjaan }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="nik">NIK</label>
                        <input type="text" class="form-control my-1" name="nik" id="nik" value="{{ $surat->nik }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="no_kk">No Kartu Keluarga</label>
                        <input type="text" class="form-control my-1" name="no_kk" id="no_kk" value="{{ $surat->no_kk }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl">Alamat</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->alamat}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl">Jenis Usaha</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->jenis_usaha}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl">Lama Usaha</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->selama}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl">Alamat Usaha</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->alamat_usaha}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl">Keperluan Surat</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->keperluan_surat}}" readonly />
                    </div>
                </div>

                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Jenis Tanda Tangan
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->kttd }} <br> <br></td>
                </tr>



                @endif
                @if ($pengajuan_surat->jenis_surat == 'Surat Pengantar Keterangan Catatan Kepolisian')


                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="nama">Nama</label>
                        <input type="text" class="form-control my-1" name="nama" id="nama" value="{{ $surat->nama }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="nik">NIK</label>
                        <input type="text" class="form-control my-1" name="nik" id="nik" value="{{ $surat->nik }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl">Tempat, Tanggal Lahir</label>
                        <input type="text" class="form-control my-1" name="ttl" id="ttl" value="{{ $surat->ttl }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="jk">Jenis Kelamin</label>
                        <input type="text" class="form-control my-1" name="jk" id="jk" value="{{ $surat->JK}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="status_perkawinan">Agama</label>
                        <input type="text" class="form-control my-1" name="agama" id="agama" value="{{ $surat->agama}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="status_kawin">Warga Negara</label>
                        <input type="text" class="form-control my-1" name="agama_anak" id="agama_anak" value="{{ $surat->warganegara}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="status_perkawinan">Status Perkawinan</label>
                        <input type="text" class="form-control my-1" name="status_perkawinan" id="status_perkawinan" value="{{ $surat->status_Perkawinan}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl">Pendidikan Terakhir</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->pendidikan_terakhir}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="no_kk">Pekerjaan</label>
                        <input type="text" class="form-control my-1" name="pekerjaan" id="pekerjaan" value="{{ $surat->pekerjaan }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl">Alamat</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->alamat}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl"> Keperluan Surat</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->keperluan}}" readonly />
                    </div>
                </div>

                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Jenis Tanda Tangan
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->kttd }} <br> <br></td>
                </tr>

                @endif
                @if ($pengajuan_surat->jenis_surat == 'Surat Pernyataan Akad Nikah')


                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="nama">Nama</label>
                        <input type="text" class="form-control my-1" name="nama" id="nama" value="{{ $surat->nama }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl">Tempat, Tanggal Lahir</label>
                        <input type="text" class="form-control my-1" name="ttl" id="ttl" value="{{ $surat->ttl }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl"> Status Pelapor</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->status_pelapor}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="no_kk">Pekerjaan</label>
                        <input type="text" class="form-control my-1" name="pekerjaan" id="pekerjaan" value="{{ $surat->pekerjaan }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl">Alamat</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->alamat}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl"> Status</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->status}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl">Telah Mendaftar Di KUA</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->daftar_kua}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl">Hari Daftar</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->hari_daftar}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl">Tanggal Daftar</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->tanggal_daftar}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl"> Keperluan Surat</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->keperluan}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl">Nama Wanita</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->nama_wanita }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl">Nama Pria</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->nama_pria }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl">Waktu Acara</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->waktu_acara}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl">Tanggal Acara</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->tanggal_acara}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl">Alamat Acara</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->alamat_acara}}" readonly />
                    </div>
                </div>

                <tr>
                    <td class="w-[40%] lg:w-[15%] font-bold">
                        Jenis Tanda Tangan
                    </td>
                </tr>
                <tr>
                    <td>{{ $surat->kttd }} <br> <br></td>
                </tr>



                @endif
                @if ($pengajuan_surat->jenis_surat == 'Surat Pernyataan Ahli Waris')



                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl">Nama Almarhum</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->nama_almarhum}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl">Nama Anak Pertama</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->nama_pertama}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl">Tempat, Tanggal Lahir</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->ttl_pertama}}" readonly />
                    </div>
                </div>
                <<div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl">Alamat </label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->alamat_pertama }}" readonly />
                    </div>

                    @for ($i = 1; $i <= 10; $i++) @if (isset($surat->{'nama' . $i}))
                        <div class="col-md-6 my-2">
                            <div class="form-group">
                                <label class="fw-bold" for="ttl"> Nama Tambahan {{ $i }} </label>
                                <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->{'nama' . $i} }}" readonly />
                            </div>
                        </div>
                        <div class="col-md-6 my-2">
                            <div class="form-group">
                                <label class="fw-bold" for="ttl"> Tempat tanggal lahir Tambahan {{ $i }} </label>
                                <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->{'ttl' . $i} }}" readonly />
                            </div>
                        </div>
                        <div class="col-md-6 my-2">
                            <div class="form-group">
                                <label class="fw-bold" for="ttl"> Alamat Tambahan {{ $i }} </label>
                                <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->{'alamat' . $i} }}" readonly />
                            </div>
                        </div>
                        @endif
                        @endfor

                        <div class="col-md-6 my-2">
                            <div class="form-group">
                                <label class="fw-bold" for="ttl"> Warisan </label>
                                <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->warisan }}" readonly />
                            </div>
                        </div>
                        <div class="col-md-6 my-2">
                            <div class="form-group">
                                <label class="fw-bold" for="ttl"> Nama Penerima </label>
                                <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->nama_penerima }}" readonly />
                            </div>
                        </div>
                        <div class="col-md-6 my-2">
                            <div class="form-group">
                                <label class="fw-bold" for="ttl">Tempat, Tanggal Lahir Penerima </label>
                                <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->ttl_penerima }}" readonly />
                            </div>
                        </div>
                        <div class="col-md-6 my-2">
                            <div class="form-group">
                                <label class="fw-bold" for="ttl">Alamat Penerima </label>
                                <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->alamat_penerima }}" readonly />
                            </div>
                        </div>
                        <tr>
                            <td class="w-[40%] lg:w-[15%] font-bold">
                                Jenis Tanda Tangan
                            </td>
                        </tr>
                        <tr>
                            <td>{{ $surat->kttd }} <br> <br></td>
                        </tr>


                        @endif

                        <div class="layout__buktiFoto row my-4">
                            <p class="textDashboard text-base text-[13px] lg:text-lg font-normal text-secondary">*Bukti foto persyaratan surat</p>
                            <div class="col-md-4 my-2">
                                <div class="form-group">
                                    <label class="fw-bold" for="nama">KTP</label>
                                    @if ($surat->fotoktp)
                                    <div class="row">
                                        <div class="col-6 thumbnail-container overflow-hidden bg-light">
                                            <a href="{{ asset('uploads/' . $surat->fotoktp) }}" data-lightbox="fotoktp">
                                                <div class="thumbnail-containero verflow-hidden" style="position: relative; padding-bottom: 75%; /* Adjust the aspect ratio as needed */">
                                                    <img src="{{ asset('uploads/' . $surat->fotoktp) }}" alt="Foto KTP" class="thumbnail-image position-absolute top-0 start-0 w-100 h-100" alt="..." style="object-fit: contain;">
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    @else
                                    Foto tidak tersedia
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4 my-2">
                                <div class="form-group w-full">
                                    <label class="fw-bold" for="nama">Kartu keluarga</label>
                                    @if ($surat->fotokk)
                                    <div class="row">
                                        <div class="col-6 thumbnail-container overflow-hidden bg-light">
                                            <a href="{{asset('uploads/' . $surat->fotokk) }}" data-lightbox="fotokk">
                                                <div class="thumbnail-container  overflow-hidden" style="position: relative; padding-bottom: 75%; /* Adjust the aspect ratio as needed */">
                                                    <img src="{{ asset('uploads/' . $surat->fotokk) }}" alt="Foto KK" class="thumbnail-image position-absolute top-0 start-0 w-100 h-100" alt="..." style="object-fit: contain;">
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    @else
                                    Foto tidak tersedia
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group w-full">
                                    <label class="fw-bold" for="nama">Surat Keterangan RT</label>
                                    @if ($surat->fotoketeranganrt)
                                    <div class="row">
                                        <div class="col-6 thumbnail-container rounded-20 overflow-hidden">
                                            <a href="{{asset('uploads/' . $surat->fotoketeranganrt) }}" data-lightbox="fotoketeranganrt">
                                                <div class="thumbnail-container  overflow-hidden" style="position: relative; padding-bottom: 75%; /* Adjust the aspect ratio as needed */">
                                                    <img src="{{ asset('uploads/' . $surat->fotoketeranganrt) }}" alt="Foto Keterangan RT/RW" class="thumbnail-image position-absolute top-0 start-0 w-100 h-100" alt="..." style="object-fit: contain;">
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    @else
                                    Foto tidak tersedia
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 my-2">
                            <div class="form-group">
                                <label class="fw-bold" for="nama">Pesan untuk Petugas/Admin</label>
                                <input type="text" class="form-control my-1" name="nama" id="nama" value="{{ $pengajuan_surat->pesan }}" readonly />
                            </div>
                        </div>
            </div>
        </div>
    </div>
</div>



@endsection