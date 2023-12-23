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
    <script>
        var chartData = @json($data);
    </script>
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
                                    @foreach ($apb->items() as $item)
                                    <div class="col-md-6">
                                        @isset($item->tahun)
                                        <p class="card-idm__text">Pendapatan Desa <br>Tahun {{ $item->tahun }}</p>
                                        @endisset
                                    </div>
                                    <div class="col-md-6 text-center center-v">
                                        @if($item->anggaran !== null)
                                            <p class="card-idm__jumlah fs-4">Rp{{ number_format($item->anggaran, 0, ',', '.') }}-</p>
                                        @endif
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 my-3">
                        <div class="card card-idm card-idm__status card-dana-keluar card-dana-keluar-pageApbdes">
                            <div class="card-body">
                                <div class="row">
                                    @foreach ($apb->items() as $item)
                                    @isset($item->tahun)
                                    <div class="col-md-6">
                                        <p class="card-idm__text">Belanja Desa <br>Tahun {{ $item->tahun }}</p>
                                    </div>
                                    <div class="col-md-6 text-center center-v ">
                                        @if($latestItem = $item->latest()->first())
                                        <p class="card-idm__jumlah fs-4">Rp{{ number_format($latestItem->jumlah, 0, ',', '.') }}-</p>
                                    @endif
                                    </div>
                                    @endisset
                                    @endforeach
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
                                        @foreach ($apb->items() as $item)
                                        <img src="{{ asset('img/landing-page/c2j.jpg') }}" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <p class="card-text text-start fw-bold jenis-pengeluaran">{{ $item->judulPengeluaran }}</p>
                                            <p class="card-text text-start detail-pengeluaran">{{ $item->pengeluaran }}</p>
                                        </div>
                                    @endforeach
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