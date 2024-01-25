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
        var latestJumlah = @json($latestJumlah);

        // Tambahkan nilai 'latestJumlah' ke setiap objek dalam 'chartData'
        chartData.forEach(function(data) {
            data.jumlah = latestJumlah;
        });
    </script>
</section>

<section>
    <div class="container mb-5">
        <div class="card bg-light">

            <div class="text-center my-3 d-flex justify-content-center">
                <div class="HeaderArticle-mengenaiDesa">
                    <h4 class="shadow">Pendapatan dan Belanja Desa Tahun 2023</h4>
                </div>
            </div>

            <section class="px-5">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="card card-idm card-idm__skor card-dana-masuk">
                            <div class="card-body">
                                <div class="row d-block">
                                @foreach ($apb->items() as $item)
                                    <div class="col-12">
                                        @isset($item->tahun)
                                        <p class="card-idm__text">Pendapatan Desa <br>Tahun {{ $item->tahun }}</p>
                                        @endisset
                                    </div>
                                    <div class="col-12 text-center center-v">
                                        @if($item->anggaran !== null)
                                        <p class="card-idm__jumlah fw-bold">Rp{{ number_format($item->anggaran, 0, ',', '.') }}</p>
                                        @endif
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-idm card-idm__status card-dana-keluar">
                            <div class="card-body">
                                <div class="row d-block">
                                    @foreach($apb as $item)
                                    @isset($item->tahun)
                                    <div class="col-12">
                                        <p class="card-idm__text">Belanja Desa <br>Tahun {{ $item->tahun }}</p>
                                    </div>
                                    <div class="col-12 text-center center-v ">
                                        @if($latestItem = $item->latest()->first())
                                        <p class="card-idm__belanja fw-bold">- Rp{{ number_format($latestItem->jumlah, 0, ',', '.') }}</p>
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
                            <div class="text-center my-3 d-flex justify-content-center">
                                <div class="HeaderArticle-mengenaiDesa">
                                    <h4 class="shadow mb-5">Detail Belanja Desa</h4>
                                </div>
                            </div>
                            @foreach ($apb->items() as $index => $item)
                            @if ($index >= 1)
                            <div class="col-4 Berita">
                                <div class="card cardBeritaPengumuman" style="border: none;">
                                    <a href="">
                                        <div class="card-body artikel-card">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div id="thumbnail" class="col-12">
                                                        <div class="thumbnail-container overflow-hidden" style="position: relative; padding-bottom: 75%; /* Adjust the aspect ratio as needed */">
                                                            <img src="{{ asset($item->gambar) }}" class="thumbnail-image object-cover position-absolute top-0 start-0 w-100 h-100" alt="..." style="object-fit: contain;">
                                                        </div>
                                                        <p class="artikel-judul text-black font-large">{{ $item->judulPengeluaran }}</p>
                                                        <p class="d-block my-1 py-2" align="justify" style="font-size: 15px; color: red;">
                                                            {{ number_format($item->pengeluaran, 0, ',', '.') }}-
                                                        </p>
                                                    </div>

                                                    <div class="col-12 mt-3">
                                                        <p class="artikel-tanggal mt-2">
                                                            <i class="fa fa-calendar"></i> <span>{{ \Carbon\Carbon::parse($item->created_at)->isoFormat('MMMM , D , Y') }}</span>
                                                        </p>
                                                    </div>
                                                    <div class="col-md-6 mt-4">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>
@endsection