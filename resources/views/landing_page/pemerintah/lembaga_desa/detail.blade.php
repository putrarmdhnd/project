@extends('landing_page.layouts.app')

@section('title')
    {{ $lembaga->nama_lembaga }}
@endsection
@section('min-height', '50vh')

@section('content')
    <div class="mt-4 container">
        <div class="row mb-4">
            <div class="col-md-8">
                <h1 id="title-board" class="text-uppercase">{{ $lembaga->nama_lembaga }}</h1>
            </div>
        </div>

        <div id="profil" class="row my-3">
            <div class="col-md-3 text-center">
                <img style="object-fit: cover !important;" src="{{ asset($lembaga->logo ?: 'img/no-image.png') }}"
                    class="card-img-top w-75" alt="">
            </div>

            <div class="col-md-9 card mt-3 mt-md-0 mt-lg-0">
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th width="25%" class="text-secondary">
                                Nama Lembaga
                            </th>
                            <td>
                                : {{ $lembaga->nama_lembaga }}
                            </td>
                        </tr>
                        <tr>
                            <th width="25%" class="text-secondary">
                                Singkatan
                            </th>
                            <td>
                                : {{ $lembaga->singkatan }}
                            </td>
                        </tr>
                        <tr>
                            <th width="25%" class="text-secondary">
                                Dasar Hukum / SK Pembuatan
                            </th>
                            <td>
                                : {{ $lembaga->dasar_hukum }}
                            </td>
                        </tr>
                        <tr>
                            <th width="25%" class="text-secondary">
                                Alamat Kantor
                            </th>
                            <td>
                                : {{ $lembaga->alamat_kantor }}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

        </div>

        <div class="col-12 card mt-5">
            <div class="card-header">
                Profil {{ $lembaga->singkatan }}
            </div>
            <div class="card-body" id="table-ckeditor">
                {!! $lembaga->profil !!}
            </div>
        </div>
        <div class="col-12 card mt-5">
            <div class="card-header">
                Visi Misi {{ $lembaga->singkatan }}
            </div>
            <div class="card-body" id="table-ckeditor">
                {!! $lembaga->visi_misi !!}
            </div>
        </div>
        <div class="col-12 card mt-5">
            <div class="card-header">
                Tugas Pokok & Fungsi {{ $lembaga->singkatan }}
            </div>
            <div class="card-body" id="table-ckeditor">
                {!! $lembaga->tugas_fungsi !!}
            </div>
        </div>
        <div class="col-12 card my-5">
            <div class="card-header">
                Kepengurusan {{ $lembaga->singkatan }}
            </div>
            <div class="card-body" id="table-ckeditor">
                {!! $lembaga->kepengurusan !!}
            </div>
        </div>
    </div>


@endsection

@push('addon-style')
    <style>
        .card .card-header {
            color: white;
            background-color: #0091bc;
        }

        .row {
            margin: 0;
            padding: 0;
        }
    </style>
@endpush
