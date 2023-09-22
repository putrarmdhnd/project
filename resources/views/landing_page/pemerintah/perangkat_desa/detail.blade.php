@extends('landing_page.layouts.app')

@section('title')
    Perangkat Desa
@endsection
@section('min-height', '50vh')

@section('content')
    <div class="mt-4 container">
        <div class="row mb-4">
            <div class="col-md-8">
                <h1 id="title-board" class="">Perangkat Desa &raquo; {{ $pegawai->nama }}</h1>
            </div>
        </div>

        <div class="row my-3">
            <div class="col-md-3 text-center">
                <img style=" object-fit: cover !important;"
                    src="{{ asset($pegawai->foto ? 'storage/' . $pegawai->foto : 'img/no-image.png') }}"
                    class="card-img-top w-75 px-3" alt="{{ $pegawai->nama }}">
            </div>

            <div class="col-md-6 card">
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th width="25%" class="text-secondary">
                                Nama Pejabat
                            </th>
                            <td>
                                : {{ $pegawai->nama }}
                            </td>
                        </tr>
                        <tr>
                            <th width="25%" class="text-secondary">
                                Jabatan
                            </th>
                            <td>
                                : {{ $pegawai->jabatan_pegawai->nama }}
                            </td>
                        </tr>
                        <tr>
                            <th width="25%" class="text-secondary">
                                NIP
                            </th>
                            <td>
                                : {{ $pegawai->nip }}
                            </td>
                        </tr>
                        <tr>
                            <th width="25%" class="text-secondary">
                                Keterangan
                            </th>
                            <td>
                                : {{ $pegawai->keterangan }}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-md-3 mt-3 mt-md-0 mt-lg-0">
                <div id="another-pegawai">
                    <div id="header" class="card col-7">
                        <h6 class="mt-2 ms-3">Pegawai Lainnya</h6>
                    </div>
                    <div id="body" class="card py-3 px-3">
                        <div class="mt-2"></div>
                        <table class="table">
                            @foreach ($another_pegawai as $item)
                                <tr>
                                    <td>
                                        <a href="{{ route('pemerintah.perangkat.detail', $item->id) }}" class="text-black">
                                            <div>
                                                <span>{{ $item->nama }}</span>
                                                <br>
                                                <span style="font-size:13px">{{ $item->jabatan_pegawai->nama }}</span>
                                            </div>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
