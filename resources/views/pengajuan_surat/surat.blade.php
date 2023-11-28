@extends('templates/dashboard')
@section('min-height', '100vh')
@section('content')
<div class="surat">
    <div class="row">
        <div class="col-12 p-2 mb-4 themeColor rounded-3 pilihSurat" style="border: 1px solid;">
            <div class="container-fluid text-center">
                <h1 class="font-semibold p-2"><b>Pilih Jenis Surat</b></h1>
                <p class="">Pembuatan Surat Paling Lambat Akan di Proses 5x24 jam</p>
            </div>
        </div>
    </div>

    <div class="kontenSurat row d-flex justify-center m-auto" >

        <div class="pilihan-surat row">
            <!-- Item 1 -->
            <div class="col-4">
                <div class="isiSurat1">
                    <a class="text-decoration-none" href="{{ route('pengajuan-surat.create',['surat' => 'keterangan_domisili_haji']) }}">
                        <div class="card  card-demografi-penduduk shadow d-flex justify-content-center align-items-center ">
                            <div class="card-bodySurat text-center">
                                <div class="HeaderArticle-pembuatan-surat">
                                    <p class=""><b class="jenis-surat">Surat Keterangan</b> <br> <i class="p-2 jenis-surat-nama">Domisili Haji</i> </p>
                                </div>
                                <div class="ImgSurat"><img class="" src="{{ asset('/img/letter.png') }}" width="100px" alt=""></div>

                            </div>
                        </div>
                    </a>
                </div>
            </div>


            <!-- Item 2 -->
            <div class="col-4">
                <div class="isiSurat1">
                    <a class="text-decoration-none" href="{{ route('pengajuan-surat.create',['surat' => 'keterangan_domisili_yayasan']) }}">
                        <div class="card card-demografi-penduduk shadow d-flex justify-content-center align-items-center">
                            <div class="card-bodySurat text-center">
                                <div class="HeaderArticle-pembuatan-surat">
                                    <p class=""><b class="jenis-surat">Surat Keterangan</b> <br> <i class="p-2 jenis-surat-nama">Domisili Yayasan</i> </p>
                                </div>
                                <div class="ImgSurat"><img class="" src="{{ asset('/img/letter.png') }}" width="100px" alt=""></div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Item 3 -->
            <div class="col-4">
                <div class="isiSurat1">
                    <a href="{{ route('pengajuan-surat.create',['surat' => 'keterangan_penguburan']) }}">
                        <div class="card card-demografi-penduduk shadow d-flex justify-content-center align-items-center">
                            <div class="card-bodySurat text-center">
                                <div class="HeaderArticle-pembuatan-surat">
                                    <p class=""><b class="jenis-surat">Surat Keterangan</b> <br> <i class="p-2 jenis-surat-nama">Penguburan</i> </p>
                                </div>
                                <div class="ImgSurat"><img class="" src="{{ asset('/img/letter.png') }}" width="100px" alt=""></div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Item 4 -->
            <div class="col-4">
                <div class="isiSurat1">
                    <a href="{{ route('pengajuan-surat.create',['surat' => 'keterangan_numpang_nikah']) }}">
                        <div class="card card-demografi-penduduk shadow d-flex justify-content-center align-items-center">
                            <div class="card-bodySurat text-center">
                                <div class="HeaderArticle-pembuatan-surat">
                                    <p class=""><b class="jenis-surat">Surat Keterangan</b> <br> <i class="p-2 jenis-surat-nama">Numpang Nikah</i> </p>
                                </div>
                                <div class="ImgSurat"><img class="" src="{{ asset('/img/letter.png') }}" width="100px" alt=""></div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Continue this structure for each item -->

            <!-- Item 5 -->
            <div class="col-4">
                <div class="isiSurat1">
                    <a href="{{ route('pengajuan-surat.create',['surat' => 'keterangan_duda_janda']) }}">
                        <div class="card card-demografi-penduduk shadow d-flex justify-content-center align-items-center">
                            <div class="card-bodySurat text-center">
                                <div class="HeaderArticle-pembuatan-surat">
                                    <p class=""><b class="jenis-surat">Surat Keterangan</b> <br> <i class="p-2 jenis-surat-nama">Duda atau Janda</i> </p>
                                </div>
                                <div class="ImgSurat"><img class="" src="{{ asset('/img/letter.png') }}" width="100px" alt=""></div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Item 6 -->
            <div class="col-4">
                <div class="isiSurat1">
                    <a href="{{ route('pengajuan-surat.create',['surat' => 'keterangan_tentang_perkawinan']) }}">
                        <div class="card card-demografi-penduduk shadow d-flex justify-content-center align-items-center">
                            <div class="card-bodySurat text-center">
                                <div class="HeaderArticle-pembuatan-surat">
                                    <p class=""><b class="jenis-surat">Surat Keterangan</b> <br> <i class="p-2 jenis-surat-nama">Perkawinan</i> </p>
                                </div>
                                <div class="ImgSurat"><img class="" src="{{ asset('/img/letter.png') }}" width="100px" alt=""></div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Continue this structure for each item -->

            <!-- Item 7 -->
            <div class="col-4">
                <div class="isiSurat1">
                    <a href="{{ route('pengajuan-surat.create',['surat' => 'keterangan_belum_nikah']) }}">
                        <div class="card card-demografi-penduduk shadow d-flex justify-content-center align-items-center">
                            <div class="card-bodySurat text-center">
                                <div class="HeaderArticle-pembuatan-surat">
                                    <p class=""><b class="jenis-surat">Surat Keterangan</b> <br> <i class="p-2 jenis-surat-nama">Belum Nikah</i> </p>
                                </div>
                                <div class="ImgSurat"><img class="" src="{{ asset('/img/letter.png') }}" width="100px" alt=""></div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Item 8 -->
            <div class="col-4">
                <div class="isiSurat1">
                    <a href="{{ route('pengajuan-surat.create',['surat' => 'keterangan_pindah_WNI']) }}">
                        <div class="card card-demografi-penduduk shadow d-flex justify-content-center align-items-center">
                            <div class="card-bodySurat text-center">
                                <div class="HeaderArticle-pembuatan-surat">
                                    <p class=""><b class="jenis-surat">Surat Keterangan</b> <br> <i class="p-2 jenis-surat-nama">Pindah WNI</i> </p>
                                </div>
                                <div class="ImgSurat"><img class="" src="{{ asset('/img/letter.png') }}" width="100px" alt=""></div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Continue this structure for each item -->

            <!-- Item 9 -->
            <div class="col-4">
                <div class="isiSurat1">
                    <a href="{{ route('pengajuan-surat.create',['surat' => 'keterangan_pindah']) }}">
                        <div class="card card-demografi-penduduk shadow d-flex justify-content-center align-items-center">
                            <div class="card-bodySurat text-center">
                                <div class="HeaderArticle-pembuatan-surat">
                                    <p class=""><b class="jenis-surat">Surat Keterangan</b> <br> <i class="p-2 jenis-surat-nama">Pindah</i> </p>
                                </div>
                                <div class="ImgSurat"><img class="" src="{{ asset('/img/letter.png') }}" width="100px" alt=""></div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Item 10 -->
            <div class="col-4">
                <div class="isiSurat1">
                    <a href="{{ route('pengajuan-surat.create',['surat' => 'keterangan_tidak_mampu']) }}">
                        <div class="card card-demografi-penduduk shadow d-flex justify-content-center align-items-center">
                            <div class="card-bodySurat text-center">
                                <div class="HeaderArticle-pembuatan-surat">
                                    <p class=""><b class="jenis-surat">Surat Keterangan</b> <br> <i class="p-2 jenis-surat-nama"> Tidak Mampu</i> </p>
                                </div>
                                <div class="ImgSurat"><img class="" src="{{ asset('/img/letter.png') }}" width="100px" alt=""></div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Continue this structure for each item -->

            <!-- Item 11 -->
            <div class="col-4">
                <div class="isiSurat1">
                    <a href="{{ route('pengajuan-surat.create',['surat' => 'keterangan_usaha']) }}">
                        <div class="card card-demografi-penduduk shadow d-flex justify-content-center align-items-center">
                            <div class="card-bodySurat text-center">
                                <div class="HeaderArticle-pembuatan-surat">
                                    <p class=""><b class="jenis-surat">Surat Keterangan</b> <br> <i class="p-2 jenis-surat-nama">Usaha</i> </p>
                                </div>
                                <div class="ImgSurat"><img class="" src="{{ asset('/img/letter.png') }}" width="100px" alt=""></div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Item 12 -->
            <div class="col-4">
                <div class="isiSurat1">
                    <a href="{{ route('pengajuan-surat.create',['surat' => 'keterangan_domisili']) }}">
                        <div class="card card-demografi-penduduk shadow d-flex justify-content-center align-items-center">
                            <div class="card-bodySurat text-center">
                                <div class="HeaderArticle-pembuatan-surat">
                                    <p class=""><b class="jenis-surat">Surat Keterangan</b> <br> <i class="p-2 jenis-surat-nama">Domisili</i> </p>
                                </div>
                                <div class="ImgSurat"><img class="" src="{{ asset('/img/letter.png') }}" width="100px" alt=""></div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Continue this structure for each item -->

            <!-- Item 13 -->
            <div class="col-4">
                <div class="isiSurat1">
                    <a href="{{ route('pengajuan-surat.create',['surat' => 'keterangan_beda_nama_data']) }}">
                        <div class="card card-demografi-penduduk shadow d-flex justify-content-center align-items-center">
                            <div class="card-bodySurat text-center">
                                <div class="HeaderArticle-pembuatan-surat">
                                    <p class=""><b class="jenis-surat">Surat Keterangan</b> <br> <i class="p-2 jenis-surat-nama">Beda Nama/Data</i> </p>
                                </div>
                                <div class="ImgSurat"><img class="" src="{{ asset('/img/letter.png') }}" width="100px" alt=""></div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Item 14 -->
            <div class="col-4">
                <div class="isiSurat1">
                    <a href="{{ route('pengajuan-surat.create',['surat' => 'keterangan_kehilangan']) }}">
                        <div class="card card-demografi-penduduk shadow d-flex justify-content-center align-items-center">
                            <div class="card-bodySurat text-center">
                                <div class="HeaderArticle-pembuatan-surat">
                                    <p class=""><b class="jenis-surat">Surat Keterangan</b> <br> <i class="p-2 jenis-surat-nama">Kehilangan</i> </p>
                                </div>
                                <div class="ImgSurat"><img class="" src="{{ asset('/img/letter.png') }}" width="100px" alt=""></div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Continue this structure for each item -->

            <!-- Item 15 -->
            <div class="col-4">
                <div class="isiSurat1">
                    <a href="{{ route('pengajuan-surat.create',['surat' => 'keterangan_orang_tua_wali']) }}">
                        <div class="card card-demografi-penduduk shadow d-flex justify-content-center align-items-center">
                            <div class="card-bodySurat text-center">
                                <div class="HeaderArticle-pembuatan-surat">
                                    <p class=""><b class="jenis-surat">Surat Keterangan</b> <br> <i class="p-2 jenis-surat-nama">Orang tua Wali</i> </p>
                                </div>
                                <div class="ImgSurat"><img class="" src="{{ asset('/img/letter.png') }}" width="100px" alt=""></div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Item 16 -->
            <div class="col-4">
                <div class="isiSurat1">
                    <a href="{{ route('pengajuan-surat.create',['surat' => 'pengantar_pembuatan_kartu_keluarga']) }}">
                        <div class="card card-demografi-penduduk shadow d-flex justify-content-center align-items-center">
                            <div class="card-bodySurat text-center">
                                <div class="HeaderArticle-pembuatan-surat">
                                    <p class=""><b class="jenis-surat">Surat Pengantar</b> <br> <i class="p-2 jenis-surat-nama">Pembuatan Kartu Keluarga</i> </p>
                                </div>
                                <div class="ImgSurat"><img class="" src="{{ asset('/img/letter.png') }}" width="100px" alt=""></div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Continue this structure for each item -->

            <!-- Item 17 -->
            <div class="col-4">
                <div class="isiSurat1">
                    <a href="{{ route('pengajuan-surat.create',['surat' => 'pengantar_keterangan_catatan_kepolisian']) }}">
                        <div class="card card-demografi-penduduk shadow d-flex justify-content-center align-items-center">
                            <div class="card-bodySurat text-center">
                                <div class="HeaderArticle-pembuatan-surat">
                                    <p class=""><b class="jenis-surat">Surat Pengantar</b> <br> <i class="p-2 jenis-surat-nama">SKCK</i> </p>
                                </div>
                                <div class="ImgSurat"><img class="" src="{{ asset('/img/letter.png') }}" width="100px" alt=""></div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Item 18 -->
            <div class="col-4">
                <div class="isiSurat1">
                    <a href="{{ route('pengajuan-surat.create',['surat' => 'surat_pernyataan_akad_nikah']) }}">
                        <div class="card card-demografi-penduduk shadow d-flex justify-content-center align-items-center">
                            <div class="card-bodySurat text-center">
                                <div class="HeaderArticle-pembuatan-surat">
                                    <p class=""><b class="jenis-surat">Surat Pernyataan</b> <br> <i class="p-2 jenis-surat-nama">Akad Nikah</i> </p>
                                </div>
                                <div class="ImgSurat"><img class="" src="{{ asset('/img/letter.png') }}" width="100px" alt=""></div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Continue this structure for each item -->

            <!-- Item 19 -->
            <div class="col-4">
                <div class="isiSurat1">
                    <a href="{{ route('pengajuan-surat.create',['surat' => 'surat_pernyataan_ahli_waris']) }}">
                        <div class="card card-demografi-penduduk shadow d-flex justify-content-center align-items-center">
                            <div class="card-bodySurat text-center">
                                <div class="HeaderArticle-pembuatan-surat">
                                    <p class=""><b class="jenis-surat">Surat Pernyataan</b> <br> <i class="p-2 jenis-surat-nama">Ahli Waris</i> </p>
                                </div>
                                <div class="ImgSurat"><img class="" src="{{ asset('/img/letter.png') }}" width="100px" alt=""></div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Item 20 -->
            <div class="col-4">
                <div class="isiSurat1">
                    <a href="{{ route('pengajuan-surat.create',['surat' => 'kelahiran']) }}">
                        <div class="card card-demografi-penduduk shadow d-flex justify-content-center align-items-center">
                            <div class="card-bodySurat text-center">
                                <div class="HeaderArticle-pembuatan-surat">
                                    <p class=""><b class="jenis-surat">Surat Keterangan</b> <br> <i class="p-2 jenis-surat-nama">Kelahiran</i> </p>
                                </div>
                                <div class="ImgSurat"><img class="" src="{{ asset('/img/letter.png') }}" width="100px" alt=""></div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Continue this structure for each item -->

            <!-- Item 21 -->
            <div class="col-4">
                <div class="isiSurat1">
                    <a href="{{ route('pengajuan-surat.create',['surat' => 'kematian']) }}">
                        <div class="card card-demografi-penduduk shadow d-flex justify-content-center align-items-center">
                            <div class="card-bodySurat text-center">
                                <div class="HeaderArticle-pembuatan-surat">
                                    <p class=""><b class="jenis-surat">Surat Keterangan</b> <br> <i class="p-2 jenis-surat-nama">Kematian</i> </p>
                                </div>
                                <div class="ImgSurat"><img class="" src="{{ asset('/img/letter.png') }}" width="100px" alt=""></div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Continue this structure for each item -->

        </div>
    </div>


    @endsection