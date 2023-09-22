@extends('landing_page.layouts.app')

@section('title')
    {{ $pengumuman->judul }}
@endsection
@section('content')
    <div id="breadcrumb" class="container my-4 my-md-4 my-lg-5">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
            aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ route('informasi.pengumuman.index') }}">Pengumuman</a></li>
                <li class="breadcrumb-item">{{ $pengumuman->judul_singkat }}</li>
            </ol>
        </nav>
    </div>

    <div id="details-news" class="container">
        <h1>{{ $pengumuman->judul }}</h1>
        <p id="info-news" class="my-4"><i class="fa-solid fa-calendar-days me-1"></i>
            {{ \Carbon\Carbon::parse($pengumuman->created_at)->isoFormat('MMMM , D , Y') }}

            <i class="fa-solid fa-user ms-2 me-1"></i>
            {{ $pengumuman->author->nama }}
        </p>

        @if ($pengumuman->gambar)
            <img id="thumbnail" src="{{ asset($pengumuman->gambar) }}">
        @endif
        


        <div id="content-desc" class="my-5 lh-lg" align="justify">
            {!! $pengumuman->deskripsi !!}
        </div>
    </div>
@endsection
