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

                @if ($surat->kttd == 'barcode')
                <a href="{{ route('pengajuan-surat.edit', $pengajuan_surat->id) }}" class="text-white bg-success focus:outline-none font-medium text-xs rounded-lg lg:text-sm px-5 py-2.5 text-center ">
                    Proses Surat
                </a>
                @endif

                @if ($surat->kttd == 'basah')
                <a href="{{ route('pengajuan_surat.basah', $pengajuan_surat->id) }}" class="text-white bg-success focus:outline-none font-medium text-xs rounded-lg lg:text-sm px-5 py-2.5 text-center ">
                    Proses Surat basah
                </a>
                @endif
            @endif

            @endcanany
            
            @canany(['kesra'])
            @if ($pengajuan_surat->status == 'verifikasi' && in_array($pengajuan_surat->jenis_surat, ['Surat Keterangan Numpang Nikah','Surat Keterangan Duda Janda','Surat Keterangan Tentang Perkawinan','Surat Keterangan Tidak Mampu','Surat Keterangan Kehilangan']))
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
            @if ($pengajuan_surat->status == 'verifikasi' && in_array($pengajuan_surat->jenis_surat, ['Surat Keterangan Domisili Haji','Surat Keterangan Domisili Yayasan','Surat Keterangan Pindah WNI','Surat Keterangan Pindah','Surat Keterangan Beda Nama Data','Surat Pengantar Pembuatan Kartu Keluarga','Surat Kematian','Surat Kelahiran','Surat Keterangan Penguburan']))
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
                        <label class="fw-bold" for="kewarganegaraan">Kewarganegaraan</label>
                        <input type="text" class="form-control my-1" name="kewarganegaraan" id="kewarganegaraan" value="{{ $surat->kewarganegaraan}}" readonly />
                    </div>
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
                        <label class="fw-bold" for="jk">Jenis Kelamin</label>
                        <input type="text" class="form-control my-1" name="jk" id="jk" value="{{ $surat->JK}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="status_perkawinan">Status Perkawinan</label>
                        <input type="text" class="form-control my-1" name="status_perkawinan" id="status_perkawinan" value="{{ $surat->status_perkawinan}}" readonly />
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
                        <label class="fw-bold" for="ttl">Nama Yayasan</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->nama_yayasan}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl">Jenis / Klasifikasi Yayasan</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->jenis_yayasan}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl">Alamat Yayasan</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->alamat_yayasan}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl">Akta Pendirian</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->akta_pendirian}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl">SK Kemenkumham</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->sk_kemenkumham}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl">Jumlah Pengurus</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->jumlah_pengurus}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl">Penanggung Jawab Yayasan</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->penanggung_jawab_yayasan}}" readonly />
                    </div>
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
                        <input type="text" class="form-control my-1" name="status_perkawinan" id="status_perkawinan" value="{{ $surat->status_perkawinan}}" readonly />
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
                        <label class="fw-bold" for="hari_tanggal"> Pada hari/Tanggal</label>
                        <input type="text" class="form-control my-1" name="hari_tanggal" id="hari_tanggal" value="{{ $surat->hari_tanggal }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="tempat_meninggal"> Tempat Meniggal </label>
                        <input type="text" class="form-control my-1" name="tempat_meninggal" id="tempat_meninggal" value="{{ $surat->tempat_meninggal }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="dikuburkan"> Dikuburkan Hari </label>
                        <input type="text" class="form-control my-1" name="dikuburkan" id="dikuburkan" value="{{ $surat->dikuburkan }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="waktu"> Waktu </label>
                        <input type="text" class="form-control my-1" name="waktu" id="waktu" value="{{ $surat->waktu }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="tempat_penguburan"> Tempat Penguburan </label>
                        <input type="text" class="form-control my-1" name="tempat_penguburan" id="tempat_penguburan" value="{{ $surat->tempat_penguburan }}" readonly />
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
                        <label class="fw-bold" for="nama_laki"> Nama </label>
                        <input type="text" class="form-control my-1" name="nama_laki" id="nama_laki" value="{{ $surat->nama_laki }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="nama_perempuan"> Nama</label>
                        <input type="text" class="form-control my-1" name="nama_perempuan" id="nama_perempuan" value="{{ $surat->nama_perempuan }}" readonly />
                    </div>
                </div>
                
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="kewarganegaraan_laki"> Warga Negara</label>
                        <input type="text" class="form-control my-1" name="kewarganegaraan_laki" id="kewarganegaraan_laki" value="{{ $surat->kewarganegaraan_laki }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="kewarganegaraan_perempuan"> Warga Negara</label>
                        <input type="text" class="form-control my-1" name="kewarganegaraan_perempuan" id="kewarganegaraan_perempuan" value="{{ $surat->kewarganegaraan_perempuan }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="pekerjaan_laki"> Pekerjaan</label>
                        <input type="text" class="form-control my-1" name="pekerjaan_laki" id="pekerjaan_laki" value="{{ $surat->pekerjaan_laki }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="pekerjaan_perempuan"> Pekerjaan</label>
                        <input type="text" class="form-control my-1" name="pekerjaan_perempuan" id="pekerjaan_perempuan" value="{{ $surat->pekerjaan_perempuan }}" readonly />
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
                        <label class="fw-bold" for="ttl_perempuan"> Tempat tanggal lahir</label>
                        <input type="text" class="form-control my-1" name="ttl_perempuan" id="ttl_perempuan" value="{{ $surat->ttl_perempuan }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="alamat_laki"> Alamat</label>
                        <input type="text" class="form-control my-1" name="alamat_laki" id="alamat_laki" value="{{ $surat->alamat_laki}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="alamat_perempuan"> Alamat</label>
                        <input type="text" class="form-control my-1" name="alamat_perempuan" id="alamat_perempuan" value="{{ $surat->alamat_perempuan }}" readonly />
                    </div>
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
                @if ($pengajuan_surat->jenis_surat == 'Surat Keterangan Pindah WNI')


                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="nama"> Nama </label>
                        <input type="text" class="form-control my-1" name="nama" id="nama" value="{{ $surat->nama }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl"> Tempat Tanggal Lahir</label>
                        <input type="text" class="form-control my-1" name="ttl" id="ttl" value="{{ $surat->ttl }}" readonly />
                    </div>
                </div>
                
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="nik"> Nik</label>
                        <input type="text" class="form-control my-1" name="kewarganegaraan_laki" id="nik" value="{{ $surat->nik }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="no_kk"> Nomor Kartu Keluarga</label>
                        <input type="text" class="form-control my-1" name="no_kk" id="no_kk" value="{{ $surat->no_kk }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="kewarganegaraan"> Kewarganegaraan</label>
                        <input type="text" class="form-control my-1" name="kewarganegaraan" id="kewarganegaraan" value="{{ $surat->kewarganegaraan }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="agama"> Agama</label>
                        <input type="text" class="form-control my-1" name="agama" id="agama" value="{{ $surat->agama }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="pekerjaan">Pekerjaan</label>
                        <input type="text" class="form-control my-1" name="pekerjaan" id="pekerjaan" value="{{ $surat->pekerjaan }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="alamat"> Alamat</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->alamat }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="keperluan"> Keperluan Surat</label>
                        <input type="text" class="form-control my-1" name="keperluan" id="keperluan" value="{{ $surat->keperluan}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="keterangan_surat"> Keterangan Surat</label>
                        <input type="text" class="form-control my-1" name="keterangan_surat" id="keterangan_surat" value="{{ $surat->keterangan_surat }}" readonly />
                    </div>
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
                @if ($pengajuan_surat->jenis_surat == 'Surat Keterangan Pindah')


                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="nama"> Nama </label>
                        <input type="text" class="form-control my-1" name="nama" id="nama" value="{{ $surat->nama }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl"> Tempat Tanggal Lahir</label>
                        <input type="text" class="form-control my-1" name="ttl" id="ttl" value="{{ $surat->ttl }}" readonly />
                    </div>
                </div>
                
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="nik"> Nik</label>
                        <input type="text" class="form-control my-1" name="kewarganegaraan_laki" id="nik" value="{{ $surat->nik }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="no_kk"> Nomor Kartu Keluarga</label>
                        <input type="text" class="form-control my-1" name="no_kk" id="no_kk" value="{{ $surat->no_kk }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="kewarganegaraan"> Kewarganegaraan</label>
                        <input type="text" class="form-control my-1" name="kewarganegaraan" id="kewarganegaraan" value="{{ $surat->kewarganegaraan }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="agama"> Agama</label>
                        <input type="text" class="form-control my-1" name="agama" id="agama" value="{{ $surat->agama }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="pekerjaan">Pekerjaan</label>
                        <input type="text" class="form-control my-1" name="pekerjaan" id="pekerjaan" value="{{ $surat->pekerjaan }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="alamat"> Alamat</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->alamat }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="keperluan"> Keperluan Surat</label>
                        <input type="text" class="form-control my-1" name="keperluan" id="keperluan" value="{{ $surat->keperluan}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="keterangan_surat"> Keterangan Surat</label>
                        <input type="text" class="form-control my-1" name="keterangan_surat" id="keterangan_surat" value="{{ $surat->keterangan_surat }}" readonly />
                    </div>
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
                @if ($pengajuan_surat->jenis_surat == 'Surat Keterangan Numpang Nikah')


                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="nama">Nama</label>
                        <input type="text" class="form-control my-1" name="nama" id="nama" value="{{ $surat->nama }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="jk"> Nama</label>
                        <input type="text" class="form-control my-1" name="jk" id="jk" value="{{ $surat->nama_perempuan }}" readonly />
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
                        <label class="fw-bold" for="jk"> NIK</label>
                        <input type="text" class="form-control my-1" name="jk" id="jk" value="{{ $surat->nik_perempuan }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="nama">Bin/Binti</label>
                        <input type="text" class="form-control my-1" name="nama" id="nama" value="{{ $surat->bin }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="jk"> Bin/Binti</label>
                        <input type="text" class="form-control my-1" name="jk" id="jk" value="{{ $surat->bin_perempuan }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="nik">Tempat/Tanggal Lahir</label>
                        <input type="text" class="form-control my-1" name="nik" id="nik" value="{{ $surat->ttl }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="jk"> Tempat/Tanggal Lahir</label>
                        <input type="text" class="form-control my-1" name="jk" id="jk" value="{{ $surat->ttl_perempuan }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="nik">Agama</label>
                        <input type="text" class="form-control my-1" name="nik" id="nik" value="{{ $surat->agama }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="jk"> Agama</label>
                        <input type="text" class="form-control my-1" name="jk" id="jk" value="{{ $surat->agama_perempuan }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="nik">Kewarganegaraan</label>
                        <input type="text" class="form-control my-1" name="nik" id="nik" value="{{ $surat->kewarganegaraan }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="jk"> Kewarganegaraan</label>
                        <input type="text" class="form-control my-1" name="jk" id="jk" value="{{ $surat->kewarganegaraan_perempuan }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="nik">Status Perkawinan</label>
                        <input type="text" class="form-control my-1" name="nik" id="nik" value="{{ $surat->status_pernikahan }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="jk"> Status Perkawinan</label>
                        <input type="text" class="form-control my-1" name="jk" id="jk" value="{{ $surat->status_pernikahan_perempuan  }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="nik">Pekerjaan</label>
                        <input type="text" class="form-control my-1" name="nik" id="nik" value="{{ $surat->pekerjaan }}" readonly />
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
                        <label class="fw-bold" for="nik">Tempat Tinggal</label>
                        <input type="text" class="form-control my-1" name="nik" id="nik" value="{{ $surat->tempat_tinggal }}" readonly />
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
                        <input type="text" class="form-control my-1" name="jk" id="jk" value="{{ $surat->jk}}" readonly />
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
                        <input type="text" class="form-control my-1" name="status_kawin" id="status_kawin" value="{{ $surat->status_perkawinan}}" readonly />
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
                        <input type="text" class="form-control my-1" name="agama_anak" id="agama_anak" value="{{ $surat->status_perkawinan_anak}}" readonly />
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
                        <input type="text" class="form-control my-1" name="jk" id="jk" value="{{ $surat->jk}}" readonly />
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
                        <input type="text" class="form-control my-1" name="status_perkawinan" id="status_perkawinan" value="{{ $surat->status_perkawinan}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="status_kawin">Warga Negara</label>
                        <input type="text" class="form-control my-1" name="agama_anak" id="agama_anak" value="{{ $surat->kewarganegaraan}}" readonly />
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
                        <input type="text" class="form-control my-1" name="jk" id="jk" value="{{ $surat->jk}}" readonly />
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
                        <input type="text" class="form-control my-1" name="status_perkawinan" id="status_perkawinan" value="{{ $surat->status_perkawinan}}" readonly />
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
                        <input type="text" class="form-control my-1" name="nama" id="nama" value="{{ $surat->status_perkawinan }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="nama">Warga Negara</label>
                        <input type="text" class="form-control my-1" name="nama" id="nama" value="{{ $surat->kewarganegaraan }}" readonly />
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
                        <input type="text" class="form-control my-1" name="jk" id="jk" value="{{ $surat->jk}}" readonly />
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
                        <input type="text" class="form-control my-1" name="status_perkawinan" id="status_perkawinan" value="{{ $surat->status_perkawinan}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="status_kawin">Warga Negara</label>
                        <input type="text" class="form-control my-1" name="agama_anak" id="agama_anak" value="{{ $surat->kewarganegaraan}}" readonly />
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
                        <input type="text" class="form-control my-1" name="jk" id="jk" value="{{ $surat->jk}}" readonly />
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
                        <input type="text" class="form-control my-1" name="status_perkawinan" id="status_perkawinan" value="{{ $surat->status_perkawinan}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="status_kawin">Warga Negara</label>
                        <input type="text" class="form-control my-1" name="agama_anak" id="agama_anak" value="{{ $surat->kewarganegaraan}}" readonly />
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
                        <input type="text" class="form-control my-1" name="jk" id="jk" value="{{ $surat->jk}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="status_kawin">Warga Negara</label>
                        <input type="text" class="form-control my-1" name="agama_anak" id="agama_anak" value="{{ $surat->kewarganegaraan}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="status_perkawinan">Status Perkawinan</label>
                        <input type="text" class="form-control my-1" name="status_perkawinan" id="status_perkawinan" value="{{ $surat->status_perkawinan}}" readonly />
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
                        <input type="text" class="form-control my-1" name="jk" id="jk" value="{{ $surat->jk}}" readonly />
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
                        <input type="text" class="form-control my-1" name="agama_anak" id="agama_anak" value="{{ $surat->kewarganegaraan}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="status_perkawinan">Status Perkawinan</label>
                        <input type="text" class="form-control my-1" name="status_perkawinan" id="status_perkawinan" value="{{ $surat->status_perkawinan}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl">Pendidikan Terakhir</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->pendidikan_trakhir}}" readonly />
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
                @if ($pengajuan_surat->jenis_surat == 'Surat Kelahiran')


                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="nama">Hari</label>
                        <input type="text" class="form-control my-1" name="nama" id="nama" value="{{ $surat->hari }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl">Tanggal</label>
                        <input type="text" class="form-control my-1" name="ttl" id="ttl" value="{{ $surat->tanggal }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl"> Tempat Lahir</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->tempat_lahir}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="no_kk">Anak Ke</label>
                        <input type="text" class="form-control my-1" name="pekerjaan" id="pekerjaan" value="{{ $surat->anak_ke }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl">Jenis Kelamin</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->kelamin}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl">Nama Anak</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->nama_anak}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl">Nama Ibu</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->nama_ibu}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl">Umur</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->umur}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl">Agama</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->agama}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl"> Nama Ayah</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->nama_ayah}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl">Agama Ayah</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->agama_ayah }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl">Pekerjaan Ayah</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->pekerjaan_ayah }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl">Kewarganegaraan</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->kewarganegaraan}}" readonly />
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
                        <label class="fw-bold" for="ttl">Nama Pelapor</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->nama_pelapor}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl">Hubungan Pelapor Dengan Anak</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->hub_pelapor_anak}}" readonly />
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
                @if ($pengajuan_surat->jenis_surat == 'Surat Pengantar Pembuatan Kartu Keluarga')


                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="nama">Nama</label>
                        <input type="text" class="form-control my-1" name="nama" id="nama" value="{{ $surat->nama }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl">NIK</label>
                        <input type="text" class="form-control my-1" name="ttl" id="ttl" value="{{ $surat->nik }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl"> Tempat Tanggal Lahir</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->ttl}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl">Nomor Kartu Keluarga</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->no_kk}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="no_kk">Kewarganegaraan</label>
                        <input type="text" class="form-control my-1" name="pekerjaan" id="pekerjaan" value="{{ $surat->kewarganegaraan }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl">Agama</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->agama}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl">Pekerjaan</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->pekerjaan}}" readonly />
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
                        <label class="fw-bold" for="ttl">Keperluan Surat</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->keperluan}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl"> Keterangan Surat</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->keterangan_surat}}" readonly />
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
                @if ($pengajuan_surat->jenis_surat == 'Surat Keterangan Beda Nama Data')


                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="nama">Nomor Kartu Keluarga</label>
                        <input type="text" class="form-control my-1" name="nama" id="nama" value="{{ $surat->kk }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl">Atas Nama Kartu Keluarga</label>
                        <input type="text" class="form-control my-1" name="ttl" id="ttl" value="{{ $surat->ankk }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl"> Ayah Atas Nama Kartu Keluarga</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->ayahkk}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="no_kk">Ibu Atas Nama Kartu Keluarga</label>
                        <input type="text" class="form-control my-1" name="pekerjaan" id="pekerjaan" value="{{ $surat->ibukk }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl">Daya Yang Benar</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->data_benar}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl">Atas Nama</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->atas_nama}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl">Yang Ingin Di Perbaiki</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->perbaikan_data}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl">Keterangan</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->keterangan}}" readonly />
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
                @if ($pengajuan_surat->jenis_surat == 'Surat Kematian')


                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="nama">Nama</label>
                        <input type="text" class="form-control my-1" name="nama" id="nama" value="{{ $surat->nama }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl">Nik</label>
                        <input type="text" class="form-control my-1" name="ttl" id="ttl" value="{{ $surat->nik }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl"> Jenis Kelamin</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->kelamin}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="no_kk">Umur</label>
                        <input type="text" class="form-control my-1" name="pekerjaan" id="pekerjaan" value="{{ $surat->umur }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl">Pekerjaan</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->pekerjaan}}" readonly />
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
                        <label class="fw-bold" for="ttl">Hari Meninggal</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->hari_meninggal}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl">Tanggal Meninggal</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->tanggal_meninggal}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl">Tempat Meninggal</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->tempat_meninggal}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl"> Nama Pelapor</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->nama_pelapor}}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl">Nik Pelapor</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->nik_pelapor }}" readonly />
                    </div>
                </div>
                <div class="col-md-6 my-2">
                    <div class="form-group">
                        <label class="fw-bold" for="ttl">Hubungan Pelapor Dengan Almarhum</label>
                        <input type="text" class="form-control my-1" name="alamat" id="alamat" value="{{ $surat->hub_pelapor_almarhum }}" readonly />
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