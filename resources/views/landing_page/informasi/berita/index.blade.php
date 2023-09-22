@extends('landing_page.layouts.app')

@section('title')
    Informasi Berita
@endsection
@section('min-height', '50vh')

@section('content')
    <!-- Board News -->
    <div id="board-news" class="mt-4 container">
        <div class="row mb-4">
            <div class="col-md-8">
                <h1 id="title-board" class="">Berita Terkini</h1>
            </div>
            <div class="col-md-4 align-self-center">
                <form action="" method="get" class="d-flex justify-content-between">
                    <input name="search" class="form-control" placeholder="Cari Berita...">
                    <button class="btn btn-primary bg-primary-2 ms-2">Cari</button>
                </form>
            </div>
        </div>

        @if (!request()->get('search'))
            @if ($top_berita)
                <div class="row">
                    @if (isset($top_berita[0]))
                        <div class="col-md-8">
                            <a href="{{ route('informasi.berita.detail', $top_berita[0]->slug) }}" id="box">
                                <div class="overlay">
                                    <img src="{{ asset('img/landing-page/news/overlay.png') }}" class="d-block w-100"
                                        alt="...">
                                </div>
                                <img src="{{ asset('storage/' . $top_berita[0]->gambar) }}" class="d-block w-100"
                                    alt="...">

                                <div id="category" class="p-4">
                                    <span class="badge text-bg-danger fs-6">TOP NEWS</span>
                                </div>
                                <div id="body" class="p-4 col-md-9 text-white">
                                    <p><i class="fa-solid fa-calendar-days me-1" style="color: #ffffff;"></i>
                                        {{ \Carbon\Carbon::parse($top_berita[0]->created_at)->isoFormat('MMMM , D , Y') }}
                                    </p>
                                    <h3 class="ln-lg">{{ $top_berita[0]->judul }}</h3>
                                </div>
                            </a>
                        </div>
                    @endif
                    <div class="col-md-4 mt-2 mt-md-0 mt-lg-0">
                        @if (isset($top_berita[1]))
                            <a href="{{ route('informasi.berita.detail', $top_berita[1]->slug) }}" id="box-2"
                                class="mb-2">
                                <div class="overlay">
                                    <img src="{{ asset('img/landing-page/news/overlay.png') }}" class="d-block w-100"
                                        alt="...">
                                </div>
                                <img src="{{ asset('storage/' . $top_berita[1]->gambar) }}" class="d-block w-100"
                                    alt="...">
                                <div id="category" class="p-4">
                                    <span class="badge text-bg-danger">TOP NEWS</span>
                                </div>
                                <div id="body" class="p-3 col-md-9 text-white ">
                                    <p><i class="fa-solid fa-calendar-days me-1" style="color: #ffffff;"></i>
                                        {{ \Carbon\Carbon::parse($top_berita[1]->created_at)->isoFormat('MMMM , D , Y') }}
                                    </p>
                                    <h6 class="ln-lg">{{ $top_berita[1]->judul }}</h5>
                                </div>
                            </a>
                        @endif
                        <div class="my-2"></div>
                        @if (isset($top_berita[2]))
                            <a href="{{ route('informasi.berita.detail', $top_berita[2]->slug) }}" id="box-3">
                                <div class="overlay">
                                    <img src="{{ asset('img/landing-page/news/overlay.png') }}" class="d-block w-100"
                                        alt="...">
                                </div>
                                <img src="{{ asset('storage/' . $top_berita[2]->gambar) }}" class="d-block w-100"
                                    alt="...">
                                <div id="category" class="p-4">
                                    <span class="badge text-bg-danger">TOP NEWS</span>
                                </div>
                                <div id="body" class="p-3 col-md-9 text-white">
                                    <p><i class="fa-solid fa-calendar-days me-1" style="color: #ffffff;"></i>
                                        {{ \Carbon\Carbon::parse($top_berita[2]->created_at)->isoFormat('MMMM , D , Y') }}
                                    </p>
                                    <h6 class="ln-lg">{{ $top_berita[2]->judul }}</h5>
                                </div>
                            </a>
                        @endif
                    </div>
                </div>
            @else
                <div></div>
            @endif

        @endif
    </div>
    <!--End  Board News -->


    <div id="list-news" class="mt-5 container ">
        <div class="row">
            <div class="col-md-8">
                @forelse ($beritas as $berita)
                    <div id="card-news" class="row mb-4"
                        onclick="window.location.href='{{ route('informasi.berita.detail', $berita->slug) }}';">
                        <div id="thumbnail" class="col-5">
                            <img src="{{ asset($berita->gambar ? 'storage/' . $berita->gambar :'img/no-picture.png') }}" width="100%"
                                class="object-cover d-block rounded-20" alt="...">
                        </div>
                        <div id="body" class="col-7">
                            <div>
                                <h4>{{ $berita->judul }}</h4>
                                <p id="info-news"><i class="fa-solid fa-calendar-days me-1"></i>
                                    {{ \Carbon\Carbon::parse($berita->created_at)->isoFormat('MMMM , D , Y') }}

                                    <i class="fa-solid fa-user ms-2 me-1"></i>
                                    {{ $berita->author->nama }}
                                </p>
                                <p id="desc" class="ln-lg d-block desc text-black" align="justify">
                                    {{ $berita->deskripsi_singkat }}</p>

                                <a href="{{ route('informasi.berita.detail', $berita->slug) }}"
                                    class="btn btn-sm bg-primary-2 d-none d-md-inline d-lg-inline text-white">Lihat
                                    Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div id="card-news" class="row mb-4">
                        <h5 class="text-center text-secondary">Berita belum ditemukan</h5>
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
                        @foreach ($berita_terbaru as $berita_baru)
                            <a href="{{ route('informasi.berita.detail', $berita_baru->slug) }}">
                                <div id="card-new-latest" class="row mb-1">
                                    <div class="col-6">
                                        <img src="{{ asset($berita_baru->gambar ? 'storage/' . $berita_baru->gambar : 'img/no-picture.png') }}" width="100%"
                                            height="95" class="object-cover d-block">
                                    </div>
                                    <div class="col-6">
                                        <h6>{{ $berita_baru->judul }} </h6>
                                        <p id="info-news" class="mt-3"><i class="fa-solid fa-calendar-days me-1"></i>
                                            {{ \Carbon\Carbon::parse($berita_baru->created_at)->isoFormat('MMMM , D , Y') }}
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
                {!! $beritas->withQueryString()->links('pagination::bootstrap-5') !!}
            </div>
        </div>
    </nav>
@endsection
