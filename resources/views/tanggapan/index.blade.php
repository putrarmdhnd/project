@extends('templates/dashboard')
@section('content')
<div class="layoutWelcome bg-white py-4 px-9 mb-5 rounded-lg flex justify-between items-center">
    <div class="">
        <h1 class="text-lg lg:text-2xl headDash font-bold mb-2">{{ $title }}</h1>
        <p class="textDashboard text-base font-normal text-secondary">Semua tanggapan yang sudah diberikan</p>
    </div>
    @can('petugas')
    <a href="/pengaduan/belum" class="text-black themeColor focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center text-decoration-none">Beri Tanggapan</a>
    @endcan
</div>

<div class="tabel-container overflow-x-auto">
    <table class="w-full rounded-lg bg-white divide-y divide-gray overflow-hidden mb-5">
        <thead class="themeColor">
            <tr class="text-black text-left">
                <th class="textTabelTop font-semibold text-sm uppercase px-4 py-4">#</th>
                <th class="textTabelTop font-semibold text-sm uppercase px-4 py-4">Isi Laporan</th>
                <th class="textTabelTop font-semibold text-sm uppercase px-4 py-4">Tanggapan</th>
                @cannot('petugas')
                <th class="textTabelTop font-semibold text-sm uppercase px-4 py-4">Ditanggapi Oleh</th>
                @endcannot
                <th class="textTabelTop font-semibold text-sm uppercase px-4 py-4">Tanggal Ditanggapi</th>
                <th class="textTabelTop font-semibold text-sm uppercase px-4 py-4 text-center">Status</th>
                <th class="textTabelTop font-semibold text-sm uppercase px-4 py-4 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray">
            @foreach ($tanggapan as $item)
            <tr class="text-center">
                <td class="textTable px-4 py-4 text-secondary">{{ $loop->iteration }}</td>
                <td class="textTable px-4 py-4 text-secondary">{{ substr($item->pengaduan->isi_laporan,0,30) . '...' }}</td>
                <td class="textTable px-4 py-4 text-secondary">{{ substr($item->tanggapan,0,40) . '...' }}</td>
                @can('admin')
                @if ($item->petugas)
                <td class="textTable px-4 py-4">
                    <a class="openDetail text-danger cursor-pointer" data-nama="{{ $item->petugas->nama }}" data-username="{{ $item->petugas->username }}" data-telepon="{{ $item->petugas->telepon }}" data-level="{{ $item->petugas->level }}">
                        {{ $item->petugas->nama }}
                    </a>
                </td>
                @else
                <td class="textTable px-4 py-4 text-secondary">-</td>
                @endif
                @endcan
                <td class="textTable px-4 py-4 text-secondary">{{ date('d F Y', strtotime($item->created_at)) }}</td>
                <td class="textTable px-4 py-4 text-center">
                    <span class="text-white text-sm w-1/3 pb-1 {{ $item->status == 'proses' ? 'bg-warning' : ''}} {{ $item->status == 'selesai' ? 'bg-success' : ''}} {{ $item->status == '0' ? 'bg-orange' : ''}} font-semibold px-2 rounded-full">{{ $item->status == '0' ? 'Belum ditanggapi' : $item->status }}</span>
                </td>
                <td class="textTable px-4 py-4 flex flex-wrap justify-center">
                    <a href="/pengaduan/{{ $item->pengaduan->id }}" class="text-primary"><i class="bx bxs-comment-dots text-lg"></i></a>
                    @can('petugas')
                    <button class="text-danger deleteTanggapan" data-id="{{ $item->id }}"><i class="bx bxs-trash text-lg"></i></button>
                    @endcan
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
    @endsection