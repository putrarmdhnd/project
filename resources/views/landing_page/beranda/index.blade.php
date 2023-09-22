@extends('landing_page.layouts.app')


@section('content')
    <!-- Carousel -->
    <div id="carousel">
        <div id="carouselExampleControls" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('img/landing-page/c1j.jpg') }}" class="d-block w-100 c-img" alt="...">
                    <div class="carousel-caption carousel-caption-1">
                        <h1>SISTEM INFORMASI</h5>
                            <h3>DESA PALASARI <br> KABUPATEN CIANJUR</h3>
                            <p>Sistem Informasi Desa: Pusat Data Masyarakat, Pelayanan Terpadu, Kemajuan Berkelanjutan.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/landing-page/c2j.jpg') }}" class="d-block w-100 c-img" alt="...">
                    <div class="carousel-caption carousel-caption-2">
                        <h1>PENGAJUAN SURAT ONLINE</h5>
                            <p>Pengajuan surat secara online mempermudah, cepat, efisien, dan modern.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/landing-page/c3j.jpg') }}" class="d-block w-100 c-img" alt="...">
                    <div class="carousel-caption carousel-caption-2">
                        <h1>AKSES INFORMASI <br> TERBARU</h5>
                            <p>Akses informasi desa terbaru memberikan warga kemudahan dalam memperoleh data vital dan peristiwa lokal. Melalui platform online, penduduk dapat mengetahui proyek, acara, dan kebijakan pemerintah setempat.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="prev">
                <img src="{{ asset('img/landing-page/arrow-left.svg') }}" alt="">
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="next">
                <img src="{{ asset('img/landing-page/arrow-right.svg') }}" alt="">
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- End Carousel -->
    <!-- Section About Us / Tentang Desa -->
    <section id="about-us" class="container">
        <div id="header-section" class="text-center">
            <h2>Tentang Desa</h2>
        </div>
        <div id="body">
            <div class="row">
                <div class="col-md-6 text-center align-self-center">
                    <p class="lh-lg"><strong>Desa Palasari</strong> Palasari adalah desa di kecamatan Cipanas, Cianjur, Jawa Barat, Indonesia. Desa Palasari terletak di kaki gunung Gede Pangrango.
                         Desa Palasari berada diantara desa Batulawang, desa Sukanagalih, desa Sindanglaya, dan Desa Sindangjaya. Desa Palasari merupakan pemekaran dari desa Cimacan Kecamatan Cipanas (Dahulu Kecamatan Pacet)
                          sesuai surat Keputusan Gubernur Jawa Barat Nomor 181/Pm.121.Pem/SK/1980 Tanggal 17 Januari 1980.
                        Desa Palasari Berada di kaki Gunung Gede Pangrango dengan luas 476 Hektar, Jumlah Penduduk mencapai 17.114 jiwa dan kepadatan mencapai 3.595 jika/km<sup>2</sup>
                        </p>
                </div>
                <div class="col-md-6 text-center align-self-center">
                    <img src="./img/landing-page/hmrj.jpg" width="90%"
                        alt="Tentang Desa Semerak | Petani Desa Semarak">
                </div>
            </div>
        </div>
    </section>


    <!-- Section Visi Misi -->
    <section id="visi-misi" class="bg-light">
        <div id="header-section" class="text-center">
            <h2 class="pt-4">Visi Misi Desa</h2>
        </div>
        <div id="body" class="container pb-5">
            <div class="row">
                <div class="col-md-6 text-center align-self-center">
                    <img src="{{ asset('img/landing-page/visimisi.png') }}" width="90%"
                        alt="Tentang Desa Semerak | Petani Desa Semarak">
                </div>
                <div class="col-md-6 align-self-center px-3 mt-5 mt-lg-0">
                    <div>
                        <h4 class="fw-bold">Visi</h4>
                        <p class="fw-light"><i>“ PALASARI LEBIH CERDAS, SEJAHTERA, ADIL DAN BERAKHLAKUL KARIMAH
                                “</i></p>
                    </div>
                    <div>
                        <h4 class="fw-bold mt-5">Misi</h4>
                        <ul class="lh-lg">
                            <li>Meningkatkan SDM dan SDA Desa Palasari untuk kesejahteraan masyarakat Desa PAlasari serta Meningkatkan Pembinaan yang berakhlaqul karimah dalam kehidupan
                                bermasyarakat dan bernegara dan Mewujudkan iklim demokrasi ditingkat desa.
                            </li>
                            
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Section Sejarah -->
    <section id="sejarah" class="container">
        <div id="header-section" class="text-center">
            <h2>Sejarah Desa</h2>
        </div>
        <div id="body" class="text-center">
            <p class="lh-lg">Desa Palasari merupakan pemekaran dari desa Cimacan Kecamatan Cipanas (Dahulu Kecamatan Pacet) sesuai surat Keputusan Gubernur Jawa Barat Nomor <b>181/Pm.121.Pem/SK/1980</b> Tanggal <b>17 Januari 1980.</b>
                Desa Palasari Berada di kaki Gunung Gede Pangrango Yang Terdapat Tugu Kerajaan Prabu Siliwanggi,Tugu Tersebut  menandakan 3 (Tiga) Daerah kekuasaanya yaitu cianjur, Sukabumi, dan Bogor. Dalam Perjalan dan perkembangan nya Pemerintah  Desa Palasari Sejak Tahun 1980 sampai dengan Mengalami Pergantian Kepala Desa sebanyak 15 kali dan yang ke 15 yang menjabat saat ini adalah
            H.Ridwan.SH </p>
        </div>
    </section>

    <section id="demografi" class="bg-light">
        <div id="header-section" class="text-center">
            <h2 class="pt-4">Demografi Desa</h2>
        </div>
        <div id="body" class="container pb-5">
            <div class="row">
                <div class="col-md-6 text-center align-self-center">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.4224179847984!2d107.03244507462495!3d-6.718196365684395!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69b3c15cf56f1b%3A0x321b4a4d7a9721a9!2sKantor%20Desa%20Palasari!5e0!3m2!1sid!2sid!4v1692723106353!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                        width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="col-md-6 align-self-center mt-5 mt-lg-0 px-md-5">
                    <p class="lh-lg">
                        <strong>Desa Palasari</strong>, desa yang berbatasan dengan desa cimacan, dengan kondisi Geografisnya<br>
                        Ketinggian Tanah Dari Permukaan Laut : 500-1000 Mdpl <br>
                        Banyaknya Curah Hujan : 3.145 mm/th<br>
                        Tofografi : Dataran Tinggi<br>
                        Suhu Udara Rata-Rata : 21 derajat celcius

                        <br>
                        <br>
                        Letak desa Palasari Kecamatan Cipanas Kab. Cianjur secara rinci sbb:
                        Desa Palasari terletak pada batas wilayahnya

                    <ul>
                        <li>Sebelah utara berbatasan dengan Desa Ciloto dan Desa Batulawang</li>
                        <li>Sebelah selatan berbatasan dengan desa sindangjaya dan desa Sindanglaya</li>
                        <li>Sebelah timur berbatasan dengan desa Sukanagalih</li>
                        <li>Sebelah Barat berbatasan Desa Cimacan</li>
                    </ul>
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection
