@extends('templates/dashboard')
@section('content')
<div class="bg-white py-6 px-9 mb-5 rounded-lg">
    <div class="flex flex-wrap">
        <div class="mb-8 mr-16">
            <p class="font-semibold text-sm uppercase text-danger mb-2">Pelapor</p>
            @canany(['petugas', 'admin'])
                <td class="px-4 py-4">
                    @if ($pengaduan->masyarakat)
                        <a class="openDetail text-danger cursor-pointer" data-nama="{{ $pengaduan->masyarakat->nama }}" data-telepon="{{ $pengaduan->masyarakat->telepon }}" data-level="{{ $pengaduan->masyarakat->level }}">
                            {{ $pengaduan->masyarakat->nama }}
                        </a>
                    @else
                    <p class="text-dark">-</p>
                    @endif
                </td>
            @endcanany
            @can('masyarakat')
            <p class="text-dark">{{ $pengaduan->masyarakat->nama }}</p>
            @endcan
        </div>
        <div class="mb-8 mr-16">
            <p class="font-semibold text-sm uppercase text-danger mb-2">Telepon</p>
            <p class="text-dark">{{ $pengaduan->masyarakat->telepon }}</p>
        </div>
        <div class="mb-8 mr-16">
            <p class="font-semibold text-sm uppercase text-danger mb-2">Tanggal</p>
            <p class="text-dark">{{ date('d F Y H:i', strtotime($pengaduan->created_at)) }}</p>
        </div>
        <div class="mb-8">
            <p class="font-semibold text-sm uppercase text-danger mb-2">Status</p>
            <span class="text-white text-sm w-1/3 pb-1 {{ $pengaduan->status == 'proses' ? 'bg-warning' : ''}} {{ $pengaduan->status == 'selesai' ? 'bg-success' : ''}} {{ $pengaduan->status == '0' ? 'bg-orange' : ''}} font-semibold px-2 rounded-full">{{ $pengaduan->status == '0' ? 'menunggu' : $pengaduan->status }}</span>
        </div>
    </div>
    <div class="mb-6">
        <p class="font-semibold text-sm uppercase text-danger mb-2">Isi Laporan</p>
        <p class="text-dark">{{ $pengaduan->isi_laporan }}</p>
    </div>
    @if ($pengaduan->lampiran)
    <img src="{{ asset('storage/' . $pengaduan->lampiran) }}" alt="{{ $pengaduan->masyarakat->nama }}" class="w-[600px]">
    @endif
</div>

@if(!$pengaduan->status == 0)
    <table class="w-full rounded-lg bg-white divide-y divide-gray overflow-hidden mb-5">
        <thead class="bg-danger">
            <tr class="text-white text-left">
                <th class="font-semibold text-sm uppercase px-4 py-4">#</th>
                <th class="font-semibold text-sm uppercase px-4 py-4">Tanggal</th>
                <th class="font-semibold text-sm uppercase px-4 py-4">Ditanggapi Oleh</th>
                <th class="font-semibold text-sm uppercase px-4 py-4 text-center">Status</th>
                <th class="font-semibold text-sm uppercase px-4 py-4">Isi Tanggapan</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray">
            @foreach ($pengaduan->tanggapan as $tanggapan)
            <tr>
                <td class="px-4 py-4 text-secondary">{{ $loop->iteration }}</td>
                <td class="px-4 py-4 text-secondary">{{ date('d F Y', strtotime($tanggapan->created_at)) }}</td>
                @if ($tanggapan->petugas)
                    @canany(['petugas', 'admin'])
                        <td class="px-4 py-4">
                            <a class="openDetail text-danger cursor-pointer" data-nama="{{ $tanggapan->petugas->nama }}" data-telepon="{{ $tanggapan->petugas->telepon }}" data-level="{{ $tanggapan->petugas->level }}">
                                {{ $tanggapan->petugas->nama }}
                            </a>
                        </td>
                    @endcanany
                    @can('masyarakat')
                        <td class="px-4 py-4 text-secondary">{{ $tanggapan->petugas->nama }}</td>
                    @endcan
                @else
                <td class="px-4 py-4 text-secondary">-</td>
                @endif
                <td class="px-4 py-4 text-center">
                    <span class="text-white text-sm w-1/3 pb-1 {{ $tanggapan->status == 'proses' ? 'bg-warning' : ''}} {{ $tanggapan->status == 'selesai' ? 'bg-success' : ''}} {{ $tanggapan->status == '0' ? 'bg-orange' : ''}} font-semibold px-2 rounded-full">{{ $tanggapan->status == '0' ? 'menunggu' : $tanggapan->status }}</span>
                </td>
                <td class="px-4 py-4 text-secondary">
                    @if ($tanggapan->tanggapan)
                        {{ substr($tanggapan->tanggapan,0,70) . '...' }}
                    @else
                        -
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endif

@if($pengaduan->status == 'proses' OR $pengaduan->status == 0)
    @canany(['petugas'])
        <div class="bg-white py-6 px-9 mb-5 rounded-lg">
            <h1 class="text-lg lg:text-2xl text-danger font-semibold mb-6">Tanggapan</h1>
            <form action="/pengaduan/respon/{{ $pengaduan->id }}" method="post" class="[&>div>label]:block [&>div>label]:mb-2 [&>div>label]:text-sm [&>div>label]:font-medium [&>div>label]:text-dark">
                @csrf
                @method('put')
                <div class="w-full mb-6">
                    <label class="tracking-wide after:content-['*'] after:ml-0.5 after:text-danger" for="grid-state">Status</label>
                    <div class="relative">
                        <select class="appearance-none px-3 py-2 rounded-lg bg-white border shadow-sm @error('status') border-danger @else border-gray @enderror placeholder-secondary focus:outline-none focus:border-gray focus:ring-gray block w-full rounded-md sm:text-sm focus:ring-1 text-secondary" id="grid-state" name="status">
                            @if ($pengaduan->status == 'proses')
                                <option selected disabled>Pilih status</option>
                                <option value="selesai">Selesai</option>
                            @elseif($pengaduan->status == 'selesai')
                                <option selected disabled>Selesai</option>
                                <option value="proses">Proses</option>
                            @elseif($pengaduan->status == 0)
                                <option selected disabled>Belum ditanggapi</option>
                                <option value="proses">Proses</option>
                                <option value="selesai">Selesai</option>
                            @endif
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <i class='bx bx-chevron-down text-xl'></i>
                        </div>
                    </div>
                    @error('status')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="tanggapan" class="after:content-['*'] after:ml-0.5 after:text-danger">Isi Tanggapan</label>
                    <textarea id="tanggapan" name="tanggapan" rows="4" class="block px-3 py-2 w-full focus:outline-none text-sm text-secondary bg-white rounded-lg border @error('tanggapan') border-danger @else border-gray @enderror shadow-sm focus:border-gray focus:ring-gray" placeholder="Ketik tanggapan...">{{ old('tanggapan') }}</textarea>
                    @error('tanggapan')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="text-white bg-danger focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">Submit</button>
                </div>
            </form>
        </div>
    @endcanany
@endif
@endsection
