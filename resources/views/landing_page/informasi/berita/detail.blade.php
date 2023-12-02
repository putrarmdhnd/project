@extends('landing_page.layouts.app')

@section('title')
{{ $berita->judul }}
@endsection
@section('content')
<div class="bg-light">
    <article id="breadcrumb" class="container px-5 bg-white" style="padding-top: 5rem;">
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

            <div id="content-desc" class="py-5 lh-lg">
                {!! $berita->deskripsi !!}
            </div>
        </div>
    </article>
</div>



@endsection