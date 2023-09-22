@extends('landing_page.layouts.app')

@section('title')
    Informasi APB Desa
@endsection

@section('min-height', '50vh')

@section('content')
    <div id="board-news" class="mt-4 container">
        <div class="row mb-4">
            <div class="col-md-8">
                <h1 id="title-board" class="">APBDesa</h1>
            </div>

        </div>
    </div>

    <div id="list-news" class="mt-5 container ">
        <div class="row">
            <div class="col-md-8">
                @forelse ($apb as $item)
                    <div id="card-news" class="row mb-4"
                        onclick="window.location.href='{{ route('informasi.apb.detail', $item->id) }}';">
                        <div id="thumbnail" class="col-5">
                            <img src="{{ asset($item->gambar ?: 'img/no-picture.png') }}" width="100%"
                                class="object-cover d-block rounded-20" alt="...">
                        </div>
                        <div id="body" class="col-7">
                            <div>
                                <h4>{{ $item->judul }} - Tahun {{ $item->tahun }}</h4>
                                <p id="info-news"><i class="fa-solid fa-calendar-days me-1"></i>
                                    {{ \Carbon\Carbon::parse($item->created_at)->isoFormat('MMMM , D , Y') }}
                                </p>
                                <p id="desc" class="ln-lg d-block desc text-black" align="justify">


                                    <a href="{{ route('informasi.apb.detail', $item->id) }}"
                                        class="btn btn-sm bg-primary-2 d-none d-md-inline d-lg-inline text-white">Lihat
                                        Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div id="card-news" class="row mb-4">
                        <h5 class="text-center text-secondary">APBDesa belum ditemukan</h5>
                    </div>
                @endforelse

            </div>
            <div class="col-md-4">
                <div id="latest-news">
                    <div id="header" class="card col-6">
                        <h5 class="mt-2 mx-4">TERBARU</h5>
                    </div>
                    <div id="body" class="card py-3 px-4">
                        <div class="mt-4"></div>
                        @foreach ($apb_terbaru as $apb_baru)
                            <a href="{{ route('informasi.pengumuman.detail', $apb_baru->id) }}">
                                <div id="card-new-latest" class="row mb-1">
                                    <div class="col-6">
                                        <img src="{{ asset($apb_baru->gambar ?: 'img/no-picture.png') }}" width="100%"
                                            height="95" class="object-cover d-block">
                                    </div>
                                    <div class="col-6">
                                        <h6>{{ $apb_baru->judul }} </h6>
                                        <p id="info-news" class="mt-3"><i class="fa-solid fa-calendar-days me-1"></i>
                                            {{ \Carbon\Carbon::parse($apb_baru->created_at)->isoFormat('MMMM , D , Y') }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <nav class="container my-5">
        <div class="row">
            <div class="col-md-8">

            </div>
        </div>
    </nav>
@endsection
