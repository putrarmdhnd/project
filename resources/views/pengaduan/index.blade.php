@extends('templates/dashboard')
@section('content')
    <div class="bg-white py-4 px-9 mb-5 rounded-lg flex justify-between items-center">
        <div class="">
            <h1 class="text-lg lg:text-2xl text-danger font-semibold mb-2">{{ $title }}</h1>
            <p class="text-base font-normal text-secondary">Semua pengaduan yang masuk</p>
        </div>
        @can('masyarakat')
            <a href="/pengaduan/create"
                class="text-white bg-danger focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">Buat
                Pengaduan</a>
        @endcan
    </div>
    <div class="overflow-x-auto">
        <table class="w-full rounded-lg bg-white divide-y divide-gray overflow-hidden mb-5">
            <thead class="bg-danger">
                <tr class="text-white text-left">
                    <th class="font-semibold text-sm uppercase px-4 py-4">#</th>
                    <th class="font-semibold text-sm uppercase px-4 py-4">Tanggal</th>
                    @canany(['petugas', 'admin'])
                        <th class="font-semibold text-sm uppercase px-4 py-4">Pelapor</th>
                    @endcanany
                    <th class="font-semibold text-sm uppercase px-4 py-4">Isi Laporan</th>
                    <th class="font-semibold text-sm uppercase px-4 py-4 text-center">Status</th>
                    <th class="font-semibold text-sm uppercase px-4 py-4">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray">
                @foreach ($pengaduan as $aduan)
                    <tr>
                        <td class="px-4 py-4 text-secondary">{{ $loop->iteration }}</td>
                        <td class="px-4 py-4 text-secondary">{{ date('d F Y', strtotime($aduan->created_at)) }}</td>
                        @canany(['petugas', 'admin'])
                            <td class="px-4 py-4">
                                @if ($aduan->masyarakat)
                                    <a class="openDetail text-danger cursor-pointer" data-nama="{{ $aduan->masyarakat->nama }}"
                                        data-telepon="{{ $aduan->masyarakat->telepon }}"
                                        data-level="{{ $aduan->masyarakat->level }}">
                                        {{ $aduan->masyarakat->nama }}
                                    </a>
                                @else
                                    <p>-</p>
                                @endif
                            </td>
                        @endcanany
                        <td class="px-4 py-4 text-secondary">{{ substr($aduan->isi_laporan, 0, 70) . '...' }}</td>
                        <td class="px-4 py-4 text-center">
                            <span
                                class="text-white text-sm w-1/3 pb-1 {{ $aduan->status == 'proses' ? 'bg-warning' : '' }} {{ $aduan->status == 'selesai' ? 'bg-success' : '' }} {{ $aduan->status == '0' ? 'bg-orange' : '' }} font-semibold px-2 rounded-full">{{ $aduan->status == '0' ? 'menunggu' : $aduan->status }}</span>
                        </td>
                        <td class="px-4 py-4 flex flex-wrap justify-start">
                            <a href="/pengaduan/{{ $aduan->id }}" class="text-primary">
                                <i class="bx bxs-comment-dots text-lg"></i>
                            </a>
                            @can('masyarakat')
                                @if ($aduan->status !== 'proses')
                                    <button class="text-danger deletePengaduan" data-id="{{ $aduan->id }}">
                                        <i class="bx bxs-trash text-lg"></i>
                                    </button>
                                @endif
                                @if ($aduan->status == '0')
                                    <a href="/pengaduan/{{ $aduan->id }}/edit" class="text-warning">
                                        <i class="bx bxs-pencil text-lg"></i>
                                    </a>
                                @endif
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
