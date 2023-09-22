@extends('templates/dashboard')
@section('content')
    <div class="bg-white py-4 px-9 mb-5 rounded-lg flex justify-between items-center">
        <div class="">
            <h1 class="text-lg lg:text-2xl text-danger font-semibold mb-2">Pengajuan Surat Online</h1>
            <p class="text-base text-[13px] lg:text-lg font-normal text-secondary">Semua pengajuan surat yang masuk</p>
        </div>
        @can('masyarakat')
            <button
                class="text-white bg-danger focus:outline-none font-medium text-xs rounded-lg lg:text-sm px-5 py-2.5 text-center buatSurat">Buat
                Surat</button>
        @endcan
    </div>
    <div class="overflow-x-auto">
        <table class="w-full rounded-lg bg-white divide-y divide-gray overflow-hidden mb-5">
            <thead class="bg-danger">
                <tr class="text-white text-left">
                    <th class="font-semibold text-sm uppercase px-4 py-4">#</th>
                    <th class="font-semibold text-sm uppercase px-4 py-4">Tanggal</th>
                    <th class="font-semibold text-sm uppercase px-4 py-4">Pengaju</th>
                    @canany(['petugas', 'admin'])
                        <th class="font-semibold text-sm uppercase px-4 py-4">No Telepon</th>
                    @endcanany
                    <th class="font-semibold text-sm uppercase px-4 py-4">Jenis Surat</th>
                    <th class="font-semibold text-sm uppercase px-4 py-4 text-center">Status</th>
                    <th class="font-semibold text-sm uppercase px-4 py-4">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray">
                @foreach ($pengajuan_saya as $item)
                    <tr>
                        <td class="px-4 py-4 text-secondary">
                            {{ $loop->iteration }}
                        </td>
                        <td class="px-4 py-4 text-secondary">
                            {{ date('d F Y', strtotime($item->created_at)) }}
                        <td class="px-4 py-4 text-secondary">
                            {{ $item->masyarakat->nama }}
                        </td>
                        @canany(['petugas', 'admin'])
                            <td class="px-4 py-4 text-secondary">
                                {{ $item->masyarakat->telepon }}
                            </td>
                        @endcanany
                        <td class="px-4 py-4 text-secondary">
                            {{ $item->jenis_surat }}
                        </td>

                        <td class="px-4 py-4 text-secondary text-center">

                            @if ($item->status == 'Pending')
                                <span class="text-dark text-sm w-1/3 py-2 font-semibold px-2 rounded-full bg-warning ">
                                    Pending
                                </span>
                            @endif

                            @if ($item->status == 'Diproses')
                                <span class="text-white text-sm w-1/3 py-2 font-semibold px-2 rounded-full bg-orange ">
                                    Sedang Diproses
                                </span>
                            @endif
                            @if ($item->status == 'Ditolak')
                                <span class="text-white text-sm w-1/3 py-2 font-semibold px-2 rounded-full bg-danger ">
                                    Ditolak
                                </span>
                            @endif
                            @if ($item->status == 'Selesai')
                                <span class="text-white text-sm w-1/3 py-2 font-semibold px-2 rounded-full bg-success ">
                                    Selesai
                                </span>

                                <br>
                                <br>
                                @canany(['admin', 'petugas'])
                                    <a href="{{ route('pengajuan_surat.preview.surat', $item->id) }}" target="__blank"
                                        class="underline text-primary">Preview Surat</a>
                                @endcanany

                                @can('masyarakat')
                                    <a href="{{ route('pengajuan_surat.download.surat', $item->id) }}" target="__blank"
                                        class="underline text-primary">Download Surat</a>
                                @endcan
                            @endif
                        </td>

                        <td class="px-4 py-4 text-secondary">
                            <div class="flex w-1/6 justify-between">

                                <a href="{{ route('pengajuan-surat.show', $item->id) }}" class="text-primary">
                                    <i class="bx bxs-pencil text-lg px-2"></i>
                                </a>

                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
