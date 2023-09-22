@extends('landing_page.layouts.app')

@section('title')
    Struktur Organisasi
@endsection
@section('min-height', '70vh')

@section('content')
    <div class="mt-4 container">
        <div class="row mb-4">
            <div class="col-md-8">
                <h1 id="title-board" class="">Struktur Organisasi</h1>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="list-group">
                    <a href="{{ route('pemerintah.organisasi.index') }}"
                        class="list-group-item list-group-item-action {{ request()->is('pemerintah/organisasi') ? 'set-active' : '' }}">
                        Struktur Organisasi </a>
                    @foreach ($strukturs as $item)
                        <a href="{{ route('pemerintah.organisasi.detail', $item->id) }}"
                            class="list-group-item list-group-item-action {{ request()->is('pemerintah/organisasi/' . $item->id) ? 'set-active' : '' }}">
                            {{ $item->nama }}
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="col-md-9 mt-3 mt-md-0 mt-lg-0">
                <div class="card">
                    <div class="card-body">
                        @if (check_route(['pemerintah.organisasi.detail']))
                            @isset($jabatan->pegawai)
                                <h4>{{ $jabatan->nama }}</h4>
                                <div class="mt-4 mb-3">
                                    <img src="{{ asset($jabatan->pegawai->foto ? 'storage/' . $jabatan->pegawai->foto : 'img/no-image.png') }}"
                                        width="150" alt="{{ $jabatan->pegawai->nama }}">
                                </div>
                                <table class="table">
                                    <tr>
                                    <th width="20%" class="text-secondary">
                                        Jabatan
                                    </th>
                                    <td>
                                        : {{ $jabatan->nama }}
                                    </td>
                                </tr>

                                    <tr>
                                        <th width="20%" class="text-secondary">
                                            Nama Pejabat
                                        </th>
                                        <td>
                                            : {{ $jabatan->pegawai->nama }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th width="20%" class="text-secondary">
                                            NIP
                                        </th>
                                        <td>
                                            : {{ $jabatan->pegawai->nip }}
                                        </td>
                                    </tr>
                                </table>
                            @else
                                <h4 class="my-4 text-center">Anggota belum ditentukan</h4>
                            @endisset
                        @else
                            <div class="text-center">
                                <img src="{{ asset('storage/struktur_desa/struktur_desa.png') }}" class="img-fluid">
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
