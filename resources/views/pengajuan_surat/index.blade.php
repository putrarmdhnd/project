@extends('templates/dashboard')
@section('content')
<div class="layoutWelcome bg-white py-4 px-9 mb-5 rounded-lg flex justify-between items-center">
    <div class="">
        <h1 class="text-lg lg:text-2xl font-bold mb-2 headDash">Pengajuan Surat Online</h1>
        <p class="textDashboard text-base text-[13px] lg:text-lg font-normal text-secondary">Semua pengajuan surat yang masuk</p>
        <br>
        @can('masyarakat')
        <p class="textDashboard fw-bold shadow-md bg-red-200 p-2 my-3 text-center rounded-20 text-[13px] lg:text-lg font-normal text-secondary">Jika Pengajuan Surat di Ajukan Dengan Cap Basah
            dan Status Surat Sudah Selesai Silahkan Datang ke Desa</p>
        @endcan
    </div>
    @can('masyarakat')
    <div class="layoutBtnPengaduan">
        <a href="{{ route('surat') }}" class="btnPengaduan text-black text-decoration-none focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center themeColor">Buat Surat</a>
    </div>
    @endcan
</div>
<div class="overflow-x-auto">
    <table class="w-full rounded-lg bg-white divide-y divide-gray overflow-hidden mb-5">
        <thead class="">
            <tr class=" text-left">
                <th class="font-semibold text-sm uppercase px-4 py-4">#</th>
                <th class="font-semibold text-sm uppercase px-4 py-4">Tanggal</th>
                <th class="font-semibold text-sm uppercase px-4 py-4">Pengaju</th>
                @canany(['petugas', 'admin','kesra','pelayanan','pemerintahan'])
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
                @canany(['petugas', 'admin' , 'kesra','pemerintahan','pelayanan'])
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

                    @if ($item->status == 'verifikasi')
                        <span class="text-white text-sm w-1/3 py-2 font-semibold px-2 rounded-full bg-orange ">
                            sudah Terverifikasi
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
                    @if ($item->status == 'beres')
                        <span class="text-white text-sm w-1/3 py-2 font-semibold px-2 rounded-full bg-success ">
                            selesai
                        </span>
                        <br>
                        <br>
                        @canany(['admin', 'petugas'])
                        <a href="{{ route('pengajuan_surat.previewew.surat', $item->id) }}" target="__blank"
                            class="underline text-primary">Preview Surat</a>
                        <a href="{{ route('pengajuan_surat.downloaded.surat', $item->id) }}" target="__blank"
                            class="underline text-primary">Download Surat</a>
                        @endcanany
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