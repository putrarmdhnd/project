@extends('landing_page.layouts.app')

@section('title')
    Perangkat Desa
@endsection
@section('min-height', '70vh')

@section('content')
    <div class="mt-4 container">
        <div class="row mb-4">
            <div class="col-md-8">
                <h1 id="title-board" class="">Perangkat Desa</h1>
            </div>
        </div>

        <div class="row my-3">
            @foreach ($pegawais as $item)
                <div class="col-6 col-md-2 mb-3">
                    <a href="{{ route('pemerintah.perangkat.detail',$item->id) }}">
                        <div class="card">
                            <img 
                            style="height: 150px !important; object-fit: cover !important;"
                            src="{{ asset($item->foto ? 'storage/' . $item->foto : 'img/no-image.png') }}"
                                class="card-img-top w-100 px-3" alt="{{ $item->nama }}">
                            <div class="card-body text-center bg-primary-2 text-white" style="margin-top: -5px !important">
                                <h6 class="m-0 text-truncate" style="font-size:13px">{{ $item->nama }}</h6>
                                <p class="text-truncate" style="margin: 0px; font-size:12px">
                                    {{ $item->jabatan_pegawai->nama }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>


@endsection
