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

            <div class="text-center my-5 d-flex justify-content-center">
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
                                    @foreach($apb as $item)
                                    <div class="col-12">
                                        @isset($item->tahun)
                                        <p class="card-idm__text">Pendapatan Desa <br>Tahun {{ $item->tahun }}</p>
                                        @endisset
                                    </div>
                                    <div class="col-12 text-end center-v">
                                        @if($item->anggaran !== null)
                                        <p class="card-idm__jumlah fw-bold h2">Rp{{ number_format($item->anggaran, 0, ',', '.') }}</p>
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
                                    <div class="col-12 text-end center-v ">
                                        @if($latestItem = $item->latest()->first())
                                        <p class="card-idm__belanja fw-bold text-danger h2">- Rp{{ number_format($latestItem->jumlah, 0, ',', '.') }}</p>
                                        @endif
                                    </div>
                                    @endisset
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <div class="text-center my-5 d-flex justify-content-center">
                <div class="HeaderArticle-mengenaiDesa">
                    <h4 class="shadow">Detail Belanja Desa</h4>
                </div>
            </div>

            <div class="detailPembelanjaan d-flex m-2">
                <div class="owl-carousel owl-carousel owl-theme owl-loaded owl-drag">
                    <div class="owl-stage-outer">
                        <div class="owl-stage" style="transition: all 0.25s ease 0s; width: 16665px; transform: translate3d(-9999px, 0px, 0px);">
                            @foreach ($apb->items() as $index => $item)
                            @if ($index >= 1)
                            <div class="owl-item">
                                <!-- Your first carousel item -->
                                <div class="col-12 d-flex justify-content-center align-items-center m-auto">
                                    <div class="card card-profil-apbdes">
                                        <div id="thumbnail" class="col-12">
                                            <div class="thumbnail-container overflow-hidden" style="position: relative; padding-bottom: 70%; background: transparent; /* Adjust the aspect ratio as needed */">
                                                <img src="{{ asset($item->gambar) }}" class="thumbnail-image position-absolute top-0 start-0 w-100 h-100 " alt="..." style="object-fit: cover;">
                                            </div>
                                        </div>
                                        <div class="card-body p-1" style="background-color: #ffa58d;">
                                            <div class="col-12 text-center content-profil-desa">
                                                <div class="mt-3 mb-3">
                                                    <p>{{ $item->judulPengeluaran }}</p>
                                                    <i class="fa fa-calendar text-black"></i> <span>{{ \Carbon\Carbon::parse($item->created_at)->isoFormat('MMMM , D , Y') }}</span>
                                                </div>
                                            </div>
                                            <div class="col-12 position-relative text-end" style="top: 6%;">
                                                <p class="h6 text-danger p-2 fw-bold">
                                                    - {{ number_format($item->pengeluaran, 0, ',', '.') }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
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
        </div>
</section>
@endsection