@extends('templates/dashboard')
@section('content')
    @php
        $surat = json_decode($pengajuan_surat->surat);
    @endphp
    <div class="bg-white py-6 px-9 mb-5 rounded-lg">
        <form action="{{ route('pengajuan-surat.update', $pengajuan_surat->id) }}" method="POST" enctype="multipart/form-data"
            class="
    [&>div>label]:block [&>div>label]:mb-2 [&>div>label]:text-sm [&>div>label]:font-medium [&>div>label]:text-dark 
    [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm
    [&>div>div>select]:border [&>div>div>select]:p-2.5 [&>div>div>select]:shadow-sm [&>div>div>select]:placeholder-secondary [&>div>div>select]:text-secondary [&>div>div>select]:w-full [&>div>div>select]:block [&>div>div>select]:rounded-lg [&>div>div>select]:sm:text-sm
    [&>div>textarea]:text-secondary [&>div>textarea]:rounded-lg [&>div>textarea]:text-sm [&>div>textarea]:block [&>div>textarea]:w-full [&>div>textarea]:border [&>div>textarea]:shadow-sm ">
            @csrf
            @method('PUT')

            <h1 class="text-2xl mt-10">Form Pengisian Surat Keterangan Kematian</h1>

            <div class="flex my-12 flex-col lg:flex-row gap-5 justify-center">

                <div
                    class="w-full 
                [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm
                ">
                    <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">No. Kode Desa</label>
                        <input type="text" name="kode_desa"
                            class="mt-1 px-3 py-2 @error('kode_desa') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                            placeholder="Masukkan Nomor Kode Desa" value="{{ old('kode_desa') }}" required />
                        @error('kode_desa')
                            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nomor Surat</label>
                        <small class="text-secondary">Contoh penulisan : 474.3 / 016 / I / 2022</small>
                        <input type="text" name="nomor_surat"
                            class="mt-1 px-3 py-2 @error('nomor_surat') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                            placeholder="Masukkan Nomor Surat" value="{{ old('nomor_surat') }}" required />
                        @error('nomor_surat')
                            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div
                    class="w-full
                [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm">

                </div>
            </div>
            <input type="hidden" value="kematian" name="jenis_surat">
            <div class="flex flex-col lg:flex-row gap-5 justify-center">
                <div
                    class="w-full 
                    [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm
                    [&>div>div>select]:border [&>div>div>select]:p-2.5 [&>div>div>select]:shadow-sm [&>div>div>select]:placeholder-secondary [&>div>div>select]:text-secondary [&>div>div>select]:w-full [&>div>div>select]:block [&>div>div>select]:rounded-lg [&>div>div>select]:sm:text-sm
                    [&>div>textarea]:text-secondary [&>div>textarea]:rounded-lg [&>div>textarea]:text-sm [&>div>textarea]:block [&>div>textarea]:w-full [&>div>textarea]:border [&>div>textarea]:shadow-sm
                    ">
                    <h2 class="text-[20px] mb-10">Informasi Almarhum / mah</h2>
                    <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama</label>
                        <input type="text" name="nama"
                            class="mt-1 px-3 py-2 @error('nama') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                            placeholder="Nama" value="{{ old('nama', $surat->nama) }}" />
                        @error('nama')
                            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">NIK</label>
                        <input type="text" name="nik"
                            class="mt-1 px-3 py-2 @error('nik') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                            placeholder="NIK" value="{{ old('nik', $surat->nik) }}" />
                        @error('nik')
                            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Tempat & Tanggal Lahir</label>
                        <input type="text" name="ttl"
                            class="mt-1 px-3 py-2 @error('ttl') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                            placeholder="Contoh : Pati, 20 Agustus 2000" value="{{ old('ttl', $surat->ttl) }}" />
                        @error('ttl')
                            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Kelamin</label>
                        <div class="relative">
                            <select
                                class="appearance-none px-3 py-2 @error('kelamin') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                                id="grid-state" name="kelamin">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="laki-laki" {{ $surat->kelamin == 'laki-laki' ? 'selected' : '' }}>Laki-Laki
                                </option>
                                <option value="perempuan" {{ $surat->kelamin == 'perempuan' ? 'selected' : '' }}>Perempuan
                                </option>
                            </select>
                            <div
                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <i class='bx bx-chevron-down text-xl'></i>
                            </div>
                        </div>
                        @error('kelamin')
                            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Agama</label>
                        <input type="text" name="agama"
                            class="mt-1 px-3 py-2 @error('agama') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                            placeholder="Kewarganegaraan & Agama" value="{{ old('agama', $surat->agama) }}" />
                        @error('agama')
                            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Alamat</label>
                        <textarea id="alamat" name="alamat" rows="4"
                            class="px-3 py-2 focus:outline-none @error('alamat') border-danger @else border-gray @enderror focus:border-gray focus:ring-gray"
                            placeholder="Alamat">{{ old('alamat', $surat->alamat) }}</textarea>
                        @error('alamat')
                            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Tanggal Meninggal</label>
                        <input type="date" name="tgl_meninggal"
                            class="mt-1 px-3 py-2 @error('tgl_meninggal') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                            placeholder="tgl_meninggal" value="{{ old('tgl_meninggal', $surat->tgl_meninggal) }}" />
                        @error('tgl_meninggal')
                            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Tempat Meninggal</label>
                        <input type="text" name="tempat_meninggal"
                            class="mt-1 px-3 py-2 @error('tempat_meninggal') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                            placeholder="Tempat Meninggal"
                            value="{{ old('tempat_meninggal', $surat->tempat_meninggal) }}" />
                        @error('tempat_meninggal')
                            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Penyebab Kematian</label>
                        <input type="text" name="penyebab_meninggal"
                            class="mt-1 px-3 py-2 @error('penyebab_meninggal') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                            placeholder="Penyebab Kematian"
                            value="{{ old('penyebab_meninggal', $surat->penyebab_meninggal) }}" />
                        @error('penyebab_meninggal')
                            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div
                    class="w-full
                [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm
                [&>div>textarea]:text-secondary [&>div>textarea]:rounded-lg [&>div>textarea]:text-sm [&>div>textarea]:block [&>div>textarea]:w-full [&>div>textarea]:border [&>div>textarea]:shadow-sm">
                    <h2 class="text-[20px] mb-10">Informasi Pelapor</h2>
                    <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama pelapor</label>
                        <input type="text" name="nama_pelapor"
                            class="mt-1 px-3 py-2 @error('nama_pelapor') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                            placeholder="Nama pelapor" value="{{ old('nama_pelapor', $surat->nama_pelapor) }}" />
                        @error('nama_pelapor')
                            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">NIK pelapor</label>
                        <input type="number" name="nik_pelapor"
                            class="mt-1 px-3 py-2 @error('nik_pelapor') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                            placeholder="NIK pelapor" value="{{ old('nik_pelapor', $surat->nik_pelapor) }}" />
                        @error('nik_pelapor')
                            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Tempat Tanggal Lahir</label>
                        <input type="text" name="ttl_pelapor"
                            class="mt-1 px-3 py-2 @error('ttl_pelapor') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                            placeholder="Contoh: Pati, 21 Desember 1998"
                            value="{{ old('ttl_pelapor', $surat->ttl_pelapor) }}" />
                        @error('ttl_pelapor')
                            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Pekerjaan pelapor</label>
                        <input type="text" name="pekerjaan_pelapor"
                            class="mt-1 px-3 py-2 @error('pekerjaan_pelapor') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                            placeholder="Pekerjaan pelapor"
                            value="{{ old('pekerjaan_pelapor', $surat->pekerjaan_pelapor) }}" />
                        @error('pekerjaan_pelapor')
                            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Alamat pelapor</label>

                        <textarea id="alamat_pelapor" name="alamat_pelapor" rows="4"
                            class="px-3 py-2 focus:outline-none @error('alamat_pelapor') border-danger @else border-gray @enderror focus:border-gray focus:ring-gray"
                            placeholder="Alamat pelapor">{{ old('alamat_pelapor', $surat->alamat_pelapor) }}</textarea>
                        @error('alamat_pelapor')
                            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Hubungan Pelapor dengan
                            Almarhum / Almarhumah</label>
                        <input type="text" name="hub_pelapor_almarhum"
                            class="mt-1 px-3 py-2 @error('hub_pelapor_almarhum') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                            placeholder="Hubungan pelapor dengan almarhum/almarhumah"
                            value="{{ old('hub_pelapor_almarhum', $surat->hub_pelapor_almarhum) }}" />
                        @error('hub_pelapor_almarhum')
                            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-6">
                        <label class="after:ml-0.5 after:text-danger">Pesan</label>
                        <small class="text-secondary">Pastikan sampaikan pesan kepada admin/petugas dengan jelas
                            untuk mempercepat pembuatan surat</small>
                        <textarea id="keterangan" name="pesan" rows="4"
                            class="px-3 py-2 focus:outline-none @error('pesan') border-danger @else border-gray @enderror focus:border-gray focus:ring-gray"
                            placeholder="Masukkan pesan surat atau pesan anda kepada petugas.">{{ old('pesan', $pengajuan_surat->pesan) }}</textarea>
                        @error('pesan')
                            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>


            <div class="flex justify-end">
                <button type="submit"
                    class="text-white bg-danger focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">Submit</button>
            </div>
        </form>
    </div>
@endsection
