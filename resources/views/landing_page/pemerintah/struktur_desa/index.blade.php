@extends('landing_page.layouts.app')

@section('title')
Struktur Organisasi
@endsection


@section('content')
<section id="StrukturOrganisasi" class="p-5">
    <div class="container mb-3">
        <div class="HeaderArticle">
            <h4 class="">Struktur Organisasi Desa</h4>
        </div>
    </div>

    <section class="space-subHeader">
        <div class="row d-flex">
            <div class="card-imgStruktur col-8 justify-content-center m-auto text-center ">
                <div class="card " style="border:1px solid black;">
                    <img src="{{ asset('img/landing-page/struktur-organisasi.jpg') }}" width="100%" alt="" class="">
                </div>
            </div>
        </div>
    </section>
</section>


<section id="ProfilPegawai" class="p-5 bg-light">
    <div class="container">
        <div class="text-center my-3 d-flex justify-content-center">
            <div class="HeaderArticle-mengenaiDesa">
                <h4 class="shadow mb-5">Siapa Saja Perangkat Desa Palasari?</h4>
            </div>
        </div>
    </div>

    <section class="space-subHeader container">
        <div class="owl-carousel owl-carousel owl-theme owl-loaded owl-drag">
            <div class="owl-stage-outer">
                <div class="owl-stage" style="transition: all 0.25s ease 0s; width: 16665px; transform: translate3d(-9999px, 0px, 0px);">
                    @isset($strukturs)
                    @foreach ($strukturs as $item)
                    <div class="owl-item">
                        <!-- Your first carousel item -->
                        <div class="col-12 ">
                            <div class="card card-profil-desa">
                                <div class="card-body">
                                    @isset($item->pegawai)
                                    @foreach($item->pegawai as $pegawai)
                                    <div class="col-12 text-center content-profil-desa">
                                        <div class="img-round center-img">
                                            <img alt="" class="img-round" src="{{ asset($pegawai->foto ? 'storage/' . $pegawai->foto : 'img/no-image.png') }}" style="border-radius: 50%;">
                                        </div>
                                        <div class="mt-3">
                                            <p>{{ $pegawai->nama }}</p>
                                            <i>{{ $item->nama }}</i>
                                        </div>
                                    </div>
                                    <div class="row d-flex text-start mt-1 isi-profil">
                                        <ul class="">
                                            <li><i>{{ $pegawai->nama }}</i></li>
                                            <li><i>{{ $pegawai->ttl }}</i></li>
                                            <li><i>{{ $pegawai->status }}</i></li>
                                            <li><i>{{ $pegawai->alamat }}</i></li>
                                            <li><i>{{ $pegawai->pendidikan }}</i></li>
                                        </ul>
                                    </div>
                                    @endforeach
                                    @endisset
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endisset
                </div>
            </div>
        </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".owl-carousel").owlCarousel({
                items: 1, // You can customize the number of items displayed.
                loop: true,
                margin: 10,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1 // Adjust the number of items displayed on different screen sizes.
                    },
                    768: {
                        items: 2
                    },
                    1024: {
                        items: 3
                    }
                }
            });
        });
    </script>

</section>

<section class=" p-5">
    <div class="container">
        <div class="row">
            <div class="container mb-3">
                <div class="HeaderArticle">
                    <h4 class="">Lembaga & Organisasi Desa</h4>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="iconLembagaDesa col-md-8">
                <div class="row text-center">
                    <div class="col-6 col-lg-4 mb-3">
                        <div class="card penduduk-card">
                            <div class="card-body">
                                <div class="center-img">
                                    <img src="{{ asset('img/struktur-organisasi/lembaga-desa/bpd.png') }}" class="img-round" alt="">
                                    <p class="penduduk-card__info my-3">Badan Permusyawaratan Desa</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-4 mb-3">
                        <div class="card penduduk-card">
                            <div class="card-body">
                                <div class="center-img">
                                    <img src="{{ asset('img/struktur-organisasi/lembaga-desa/karang-taruna.png') }}" class="img-round" alt="">
                                    <p class="penduduk-card__info my-3">Karang Taruna</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-4 mb-3">
                        <div class="card penduduk-card">
                            <div class="card-body">
                                <div class="center-img">
                                    <img src="{{ asset('img/struktur-organisasi/lembaga-desa/linmas.png') }}" class="img-round" alt="">
                                    <p class="penduduk-card__info my-3">Satuan Perlindungan Masyarakat</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-4 mb-3">
                        <div class="card penduduk-card">
                            <div class="card-body">
                                <div class="center-img">
                                    <img src="{{ asset('img/struktur-organisasi/lembaga-desa/mui.png') }}" class="img-round" alt="">
                                    <p class="penduduk-card__info my-3">Majelis Ulama Indonesia</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-4 mb-3">
                        <div class="card penduduk-card">
                            <div class="card-body">
                                <div class="center-img">
                                    <img src="{{ asset('img/struktur-organisasi/lembaga-desa/pkk.png') }}" class="img-round" alt="">
                                    <p class="penduduk-card__info my-3">Pemberdayaan Kesejahteraan Keluarga</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-4 mb-3">
                        <div class="card penduduk-card">
                            <div class="card-body">
                                <div class="center-img">
                                    <img src="{{ asset('img/struktur-organisasi/lembaga-desa/lpmd.png') }}" class="img-round" alt="">
                                    <p class="penduduk-card__info my-3">Lembaga Pemberdayaan Masyarakat Desa</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="AnggotaLembaga col-md-4 mb-5">
                <div class="tg-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th class="th-1 fw-normal">Lembaga & Organisasi</th>
                                <th class="th-1 fw-normal">Jumlah Anggota</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Badan Permusyawaratan Desa (BPD)</td>
                                <td class="td-center">7</td>
                            </tr>
                            <tr>
                                <td>LPMD/LKMD</td>
                                <td class="td-center">6</td>
                            </tr>
                            <tr>
                                <td>MUI</td>
                                <td class="td-center">10</td>
                            </tr>
                            <tr>
                                <td>Linmas</td>
                                <td class="td-center">36</td>
                            </tr>
                            <tr>
                                <td>PKK</td>
                                <td class="td-center">13</td>
                            </tr>
                            <tr>
                                <td>Karang Taruna</td>
                                <td class="td-center">21</td>
                            </tr>
                            <tr>
                                <td>BUMDES</td>
                                <td class="td-center">4</td>
                            </tr>
                            <tr>
                                <td>Posyandu</td>
                                <td class="td-center">18</td>
                            </tr>
                            <tr>
                                <td>Polindes</td>
                                <td class="td-center">1</td>
                            </tr>
                            <tr>
                                <td>RW</td>
                                <td class="td-center">12</td>
                            </tr>
                            <tr>
                                <td>RT</td>
                                <td class="td-center">38</td>
                            </tr>
                            <tr>
                                <td>Gakpotan</td>
                                <td class="td-center">2</td>
                            </tr>
                            <tr>
                                <td>Kelompok Tani</td>
                                <td class="td-center">2</td>
                            </tr>
                            <tr>
                                <td>DKM/Masjid</td>
                                <td class="td-center">41</td>
                            </tr>
                            <tr>
                                <td>Partai Politik</td>
                                <td class="td-center">6</td>
                            </tr>
                            <tr>
                                <td>Kelompok Senam</td>
                                <td class="td-center">1</td>
                            </tr>
                            <tr>
                                <td>Unit Simpan Pinjam</td>
                                <td class="td-center">1</td>
                            </tr>
                            <tr>
                                <td>Koperasi</td>
                                <td class="td-center">1</td>
                            </tr>
                            <tr>
                                <td>Lainnya</td>
                                <td class="td-center">3</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection