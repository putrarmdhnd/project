@extends('landing_page.layouts.app')
@section('title')
    Pembuatan Surat Online
@endsection
@section('min-height', '100vh')
@section('content')
<div class="surat">
    <h1 class="text-xl lg:text-2xl font-semibold text-dark mb-4 text-center">Pilih Jenis Surat</h1>
    <h4 class="text-xl lg:text-2xl font-semibold text-dark mb-4 text-center">Pembuatan Surat Paling Lambat Akan di Proses 5x24 jam</h4>
    <div class="kontenSurat"  style="margin-top: 10px; margin-bottom: 10px;">
        <div class="isiSurat" style="display: flex;">
            <div class="kolom">
            <div class="isiSurat1">
            <a href="{{ route('pengajuan-surat.create',['surat' => 'keterangan_domisili_haji']) }}">
                <div
                    class="KontenGambar">
                    <img class="gambar" src="{{ asset('/img/keterangan_pengantar.png') }}"
                        alt="">
                    <p class="py-1 text-md text-dark" style="margin-left:5px;">surat keterangan domisili haji DONE</p>
                </div>
            </a>
        </div>
        <div class="isiSurat1">
            <a href="{{ route('pengajuan-surat.create',['surat' => 'keterangan_domisili_yayasan']) }}">
                <div
                    class="KontenGambar">
                    <img class="gambar" src="{{ asset('/img/keterangan_pengantar.png') }}"
                        alt="">
                    <p class="py-1 text-md text-dark" style="margin-left:5px;">surat keterangan domisili yayasan DONE</p>
                </div>
            </a>
        </div>
    </div>
    <div class="kolom">
        <div class="isiSurat1">
            <a href="{{ route('pengajuan-surat.create',['surat' => 'keterangan_penguburan']) }}">
                <div
                    class="KontenGambar">
                    <img class="gambar" src="{{ asset('/img/keterangan_pengantar.png') }}"
                        alt="">
                    <p class="py-1 text-md text-dark" style="margin-left:5px;">surat keterangan penguburan DONE</p>
                </div>
            </a>
        </div>
        <div class="isiSurat1">
            <a href="{{ route('pengajuan-surat.create',['surat' => 'keterangan_numpang_nikah']) }}">
                <div
                    class="KontenGambar">
                    <img class="gambar" src="{{ asset('/img/keterangan_pengantar.png') }}"
                        alt="">
                    <p class="py-1 text-md text-dark" style="margin-left:5px;">surat keterangan numpang nikah DONE</p>
                </div>
            </a>
        </div>
    </div>
    <div class="kolom">
        <div class="isiSurat1">
            <a href="{{ route('pengajuan-surat.create',['surat' => 'keterangan_duda_janda']) }}">
                <div
                    class="KontenGambar">
                    <img class="gambar" src="{{ asset('/img/keterangan_pengantar.png') }}"
                        alt="">
                    <p class="py-1 text-md text-dark" style="margin-left:5px;">surat keterangan duda/janda DONE</p>
                </div>
            </a>
        </div>
        <div class="isiSurat1">
            <a href="{{ route('pengajuan-surat.create',['surat' => 'keterangan_tentang_perkawinan']) }}">
                <div
                    class="KontenGambar">
                    <img class="gambar" src="{{ asset('/img/keterangan_pengantar.png') }}"
                        alt="">
                    <p class="py-1 text-md text-dark" style="margin-left:5px;">surat keterangan tentang perkawinan DONE</p>
                </div>
            </a>
        </div>
    </div>
    <div class="kolom">
        <div class="isiSurat1">
            <a href="{{ route('pengajuan-surat.create',['surat' => 'keterangan_belum_nikah']) }}">
                <div
                    class="KontenGambar">
                    <img class="gambar" src="{{ asset('/img/keterangan_pengantar.png') }}"
                        alt="">
                    <p class="py-1 text-md text-dark" style="margin-left:5px;">surat keterangan belum nikah DONE</p>
                </div>
            </a>
        </div>

                <div class="isiSurat1">
                <a href="{{ route('pengajuan-surat.create',['surat' => 'keterangan_pindah_WNI']) }}">
                    <div
                        class="KontenGambar">
                        <img class="gambar" src="{{ asset('/img/keterangan_pengantar.png') }}"
                            alt="">
                        <p class="py-1 text-md text-dark" style="margin-left:5px;">surat keterangan pindah WNI</p>
                    </div>
                </a>
            </div>
        </div>
        <div class="kolom">
            <div class="isiSurat1">
                <a href="{{ route('pengajuan-surat.create',['surat' => 'keterangan_pindah']) }}">
                    <div
                        class="KontenGambar">
                        <img class="gambar" src="{{ asset('/img/keterangan_pengantar.png') }}"
                            alt="">
                        <p class="py-1 text-md text-dark" style="margin-left:5px;">surat keterangan pindah</p>
                    </div>
                </a>
            </div>
            <div class="isiSurat1">
                <a href="{{ route('pengajuan-surat.create',['surat' => 'keterangan_tidak_mampu']) }}">
                    <div
                        class="KontenGambar">
                        <img class="gambar" src="{{ asset('/img/keterangan_pengantar.png') }}"
                            alt="">
                        <p class="py-1 text-md text-dark" style="margin-left:5px;">surat keterangan tidak mampu DONE</p>
                    </div>
                </a>
            </div>
        </div>
        <div class="kolom">
            <div class="isiSurat1">
                <a href="{{ route('pengajuan-surat.create',['surat' => 'keterangan_usaha']) }}">
                    <div
                        class="KontenGambar">
                        <img class="gambar" src="{{ asset('/img/keterangan_pengantar.png') }}"
                            alt="">
                        <p class="py-1 text-md text-dark" style="margin-left:5px;">surat keterangan usaha DONE</p>
                    </div>
                </a>
            </div>
            <div class="isiSurat1">
                <a href="{{ route('pengajuan-surat.create',['surat' => 'keterangan_domisili']) }}">
                    <div
                        class="KontenGambar">
                        <img class="gambar" src="{{ asset('/img/keterangan_pengantar.png') }}"
                            alt="">
                        <p class="py-1 text-md text-dark" style="margin-left:5px;">surat keterangan dommisili DONE</p>
                    </div>
                </a>
            </div>
        </div>
        <div class="kolom">
            <div class="isiSurat1">
                <a href="{{ route('pengajuan-surat.create',['surat' => 'keterangan_beda_nama_data']) }}">
                    <div
                        class="KontenGambar">
                        <img class="gambar" src="{{ asset('/img/keterangan_pengantar.png') }}"
                            alt="">
                        <p class="py-1 text-md text-dark" style="margin-left:5px;">surat keterangan beda nama/data</p>
                    </div>
                </a>
            </div>
            <div class="isiSurat1">
                <a href="{{ route('pengajuan-surat.create',['surat' => 'keterangan_kehilangan']) }}">
                    <div
                        class="KontenGambar">
                        <img class="gambar" src="{{ asset('/img/keterangan_pengantar.png') }}"
                            alt="">
                        <p class="py-1 text-md text-dark" style="margin-left:5px;">surat keterangan kehilangan DONE</p>
                    </div>
                </a>
            </div>
        </div>
        <div class="kolom">
                    <div class="isiSurat1">
                    <a href="{{ route('pengajuan-surat.create',['surat' => 'keterangan_orang_tua_wali']) }}">
                        <div
                            class="KontenGambar">
                            <img class="gambar" src="{{ asset('/img/keterangan_pengantar.png') }}"
                                alt="">
                            <p class="py-1 text-md text-dark" style="margin-left:5px;">surat keterangan orang tua wali DONE</p>
                        </div>
                    </a>
                </div>
                <div class="isiSurat1">
                    <a href="{{ route('pengajuan-surat.create',['surat' => 'pengantar_pembuatan_kartu_keluarga']) }}">
                        <div
                            class="KontenGambar">
                            <img class="gambar" src="{{ asset('/img/pengantar.png') }}"
                                alt="">
                            <p class="py-1 text-md text-dark" style="margin-left:5px;">surat pengantar pembuatan <br>kartu keluarga</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="kolom">
                <div class="isiSurat1">
                    <a href="{{ route('pengajuan-surat.create',['surat' => 'pengantar_keterangan_catatan_kepolisian']) }}">
                        <div
                            class="KontenGambar">
                            <img class="gambar" src="{{ asset('/img/pengantar.png') }}"
                                alt="">
                            <p class="py-1 text-md text-dark" style="margin-left:5px;">surat pengantar keterangan <br>catatan kepolisian SKCK DONE</p>
                        </div>
                    </a>
                </div>
                <div class="isiSurat1">
                    <a href="{{ route('pengajuan-surat.create',['surat' => 'surat_pernyataan_akad_nikah']) }}">
                        <div
                            class="KontenGambar">
                            <img class="gambar" src="{{ asset('/img/pernyataan.png') }}"
                                alt="">
                            <p class="py-1 text-md text-dark" style="margin-left:5px;">surat pernyataan akad nikah</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="kolom">
                <div class="isiSurat1">
                    <a href="{{ route('pengajuan-surat.create',['surat' => 'surat_pernyataan_ahli_waris']) }}">
                        <div
                            class="KontenGambar">
                            <img class="gambar" src="{{ asset('/img/pernyataan.png') }}"
                                alt="">
                            <p class="py-1 text-md text-dark" style="margin-left:5px;">surat pernyataan ahli waris</p>
                        </div>
                    </a>
                </div>
                <div class="isiSurat1">
                    <a href="{{ route('pengajuan-surat.create',['surat' => 'kelahiran']) }}">
                        <div
                            class="KontenGambar">
                            <img class="gambar" src="{{ asset('/img/kelahiran.png') }}"
                                alt="">
                            <p class="py-1 text-md text-dark" style="margin-left:5px;">Kelahiran DONE</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="kolom">
                <div class="isiSurat1">
                    <a href="{{ route('pengajuan-surat.create',['surat' => 'kematian']) }}">
                        <div
                            class="KontenGambar">
                            <img class="gambar" src="{{ asset('/img/kematian.png') }}"
                                alt="">
                            <p class="py-1 text-md text-dark" style="margin-left:5px;">Kematian DONE</p>
                        </div>
                    </a>
                </div>
            </div> 
    </div>
    </div>
</div>
@endsection