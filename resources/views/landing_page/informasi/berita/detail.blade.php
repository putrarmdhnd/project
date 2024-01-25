@extends('landing_page.layouts.app')

@section('title')
{{ $berita->judul }}
@endsection
@section('content')
<div class="container-fluid" style="padding-top: 5rem; padding-bottom: 3rem;">
    <div class="row">
        <div class="BeritaDetail col-8 bg-light">
            <article id="breadcrumb" class="card container px-5 bg-white">
                <div id="details-news">
                    <div class="bg-light p-3">
                        <h1><b>{{ $berita->judul }}</b></h1>
                        <h6 class="ml-3 text-decoration-underline ">Berita</h6>
                    </div>

                    <div class="d-flex justify-content-between mt-4 mx-3">
                        <p id="info-news" class="">Ditulis oleh : <b>{{ $berita->author->nama }}</b></p>
                        <p id="info-news" class=""> {{ \Carbon\Carbon::parse($berita->created_at)->isoFormat('MMMM , D , Y') }} </p>

                    </div>


                    <div id="thumbnail" class="bg-dark">
                        @if ($berita->gambar)
                        <img id="thumbnail" src="{{ asset('storage/' . $berita->gambar) }}">
                        @endif
                    </div>

                    <div class=" overflow-hidden">
                        <div id="content-desc" class="content-desc py-5 px-5 lh-lg content-p thumbnail-image object-cover" alt="..." style="object-fit: contain;"> {!! $berita->deskripsi !!}</div>
                    </div>

                </div>
            </article>
        </div>
        <div class="LatestNews col-4">
            <div class="bg-white">
                <div id="latest-news">
                    <div id="body" class="card py-3 px-4">
                        <h5 class="mt-2"><b>TERBARU</b></h5>

                        <div class="mt-4"></div>
                        @foreach ($berita_terbaru as $berita_baru)
                        <a href="{{ route('informasi.berita.detail', $berita_baru->slug) }}">
                            <div id="card-new-latest" class="row mb-1">
                                <div class="col-6 bg-dark" style="border-radius: 10px;">
                                    <img src="{{ asset($berita_baru->gambar ? 'storage/' . $berita_baru->gambar : 'img/no-picture.png') }}" width="100%" height="103" class=" d-block" style="object-fit: contain;">
                                </div>
                                <div class="col-6">
                                    <p class="fw-bold text-black" style="font-size: 12px;">{{ $berita_baru->judul_singkat }} </p>
                                    <p id="info-news" class="mt-3" style="font-size: 10px;"><i class="fa-solid fa-calendar-days me-1"></i>
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
</div>




@endsection