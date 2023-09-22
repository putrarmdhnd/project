@extends('landing_page.layouts.app')

@section('title')
    Lembaga Desa
@endsection
@section('min-height', '50vh')

@section('content')
    <div class="mt-4 container">
        <div class="row mb-4">
            <div class="col-md-8">
                <h1 id="title-board" class="">Lembaga Desa</h1>
            </div>
        </div>

        <div class="row my-3">
            <div class="table-respons">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Lembaga Desa</th>
                            <th scope="col">Alamat Kantor</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lembagas as $item)
                            <tr>
                                <td>
                                    <a href="{{ route('pemerintah.lembaga.detail', $item->id) }}"
                                        class="text-primary-2">{{ $item->nama_lembaga }}</a>
                                    <br>
                                    @if ($item->singkatan)
                                        <span class="badge rounded-pill bg-primary-2">{{ $item->singkatan }}</span>
                                    @endif
                                </td>
                                <td>
                                    <p>{{ $item->alamat_kantor }}</p>
                                </td>
                                <td>
                                    <img width="50" src="{{ asset($item->logo) }}" alt="">
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection
