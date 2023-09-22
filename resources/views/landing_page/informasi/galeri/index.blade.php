@extends('landing_page.layouts.app')

@section('title')
    Informasi Berita
@endsection

@section('content')
    <div id="board-news" class="mt-4 container">
        <div class="row mb-4">
            <div class="col-md-8">
                <h1 id="title-board" class="">Galeri Foto</h1>
            </div>

        </div>
    </div>

    <div class="container mb-5 container-gallery">
        @foreach ($galeries as $item)
            {{-- make random class with value h-2,h-3 --}}
            @php
                $random = rand(1, 2);
                if ($random == 1) {
                    $random_height = 'h-2';
                } else {
                    $random_height = 'h-3';
                }
            @endphp

            <div class="gallery-container w-2 {{ $random_height }}">
                <div class="gallery-item">
                    <div class="image">
                        <a href="{{ asset($item->gambar) }}" data-lightbox="image" data-title="{{ $item->judul }}">
                            <img src="{{ asset($item->gambar) }}">
                        </a>
                    </div>
                    <div class="text">{{ $item->judul }}</div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@push('addon-style')
    <link rel="stylesheet" href="{{ asset('css/landing-page/galeri.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.css" />
@endpush

@push('addon-script')
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js"></script>
@endpush
