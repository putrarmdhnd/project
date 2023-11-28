@extends('landing_page.layouts.app')

@section('title')
APBDesa
@endsection

@section('content')
<section id="StrukturOrganisasi" class="p-5">
    <div class="container">
        <div class="HeaderArticle ">
            <h4 class="">Dana APBDesa Tahunan</h4>
        </div>
    </div>

    <section class="space-subHeader">
        <div class="container">
            <div class="row d-block ">
                <div class="row text-center my-3">
                    <div id="apbdesTahunan" class="mt-4"></div>
                </div>
            </div>
        </div>
    </section>
</section>

<section>
    <div class="container mb-5">
        <div class="card bg-light">

            <div class="text-center my-3 d-flex justify-content-center">
                <div class="HeaderArticle-mengenaiDesa">
                    <h4 class="shadow mb-5">Pendapatan dan Belanja Desa Tahun 2023</h4>
                </div>
            </div>

            <section class="space-subHeader px-5">
                <div class="row">
                    <div class="col-md-6 my-3">
                        <div class="card card-idm card-idm__skor  card-dana-masuk card-dana-masuk-pageApbdes">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="card-idm__text">Pendapatan Desa <br>Tahun 2023</p>
                                    </div>
                                    <div class="col-md-6 text-center center-v">
                                        <p class="card-idm__jumlah fs-4">Rp1.224.779.772,-</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 my-3">
                        <div class="card card-idm card-idm__status card-dana-keluar card-dana-keluar-pageApbdes">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="card-idm__text">Belanja Desa <br>Tahun 2023</p>
                                    </div>
                                    <div class="col-md-6 text-center center-v ">
                                        <p class="card-idm__infoStatus fs-4">Rp1.174.779.772,-</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 detailPembelanjaan m-4">
                        <div class="row">
                            <div class="col-12">
                                <h5>Detail Belanja Desa</h5>
                            </div>
                                <div class="col-4 Layoutcard-anggaran-pengeluaran">
                                    <div class="card card-anggaran-pengeluaran">
                                        <img src="{{ asset('img/landing-page/c2j.jpg') }}" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <p class="card-text text-start fw-bold jenis-pengeluaran">Pemeliharaan Kantor Desa</p>
                                            <p class="card-text text-start detail-pengeluaran">Rp.25.000.000</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4 Layoutcard-anggaran-pengeluaran">
                                    <div class="card card-anggaran-pengeluaran">
                                        <img src="{{ asset('img/landing-page/c2j.jpg') }}" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <p class="card-text text-start fw-bold jenis-pengeluaran">Musyawarah Besar Desa</p>
                                            <p class="card-text text-start detail-pengeluaran">Rp.3.000.000</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4 Layoutcard-anggaran-pengeluaran">
                                    <div class="card card-anggaran-pengeluaran">
                                        <img src="{{ asset('img/landing-page/c2j.jpg') }}" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <p class="card-text text-start fw-bold jenis-pengeluaran">Jumat Bersih</p>
                                            <p class="card-text text-start detail-pengeluaran">Rp.10.000.000</p>
                                        </div>
                                    </div>
                                </div>

                            
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>

@endsection