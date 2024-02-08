@extends('templates/dashboard')
@section('content')
    <div class="bg-white py-6 px-9 mb-5 rounded-lg">
        <form action="{{ route('pengajuan-surat.store') }}" method="POST" enctype="multipart/form-data"
            class="
    [&>div>label]:block [&>div>label]:mb-2 [&>div>label]:text-sm [&>div>label]:font-medium [&>div>label]:text-dark 
    [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm
    [&>div>div>select]:border [&>div>div>select]:p-2.5 [&>div>div>select]:shadow-sm [&>div>div>select]:placeholder-secondary [&>div>div>select]:text-secondary [&>div>div>select]:w-full [&>div>div>select]:block [&>div>div>select]:rounded-lg [&>div>div>select]:sm:text-sm
    [&>div>textarea]:text-secondary [&>div>textarea]:rounded-lg [&>div>textarea]:text-sm [&>div>textarea]:block [&>div>textarea]:w-full [&>div>textarea]:border [&>div>textarea]:shadow-sm ">
            @csrf
            <h1 class="text-2xl text-center my-8">Form Pengisian Surat Keterangan usaha</h1>
            <input type="hidden" value="keterangan Usaha" name="jenis_surat">
            <div class="flex flex-col lg:flex-row gap-5 justify-center">
                <div
                class="w-full 
                [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm
                [&>div>div>select]:border [&>div>div>select]:p-2.5 [&>div>div>select]:shadow-sm [&>div>div>select]:placeholder-secondary [&>div>div>select]:text-secondary [&>div>div>select]:w-full [&>div>div>select]:block [&>div>div>select]:rounded-lg [&>div>div>select]:sm:text-sm
                ">
                    <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama</label>
                        <input type="text" name="nama"
                            class="mt-1 px-3 py-2 @error('nama') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                            placeholder="Nama" value="{{ old('nama') }}" />
                        @error('nama')
                            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Tempat & Tanggal Lahir</label>
                        <input type="text" name="ttl"
                            class="mt-1 px-3 py-2 @error('ttl') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                            placeholder="Contoh : Cipanas, 20 Agustus 2000" value="{{ old('ttl') }}" />
                        @error('ttl')
                            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Jenis Kelamin</label>
                        <div class="relative">
                            <select
                                class="appearance-none px-3 py-2 @error('jk') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                                id="grid-state" name="jk">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="laki-laki">Laki-Laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                            <div
                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <i class='bx bx-chevron-down text-xl'></i>
                            </div>
                        </div>
                        @error('jk')
                            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Warga Negara</label>
                        <input type="text" name="warganegara"
                            class="mt-1 px-3 py-2 @error('warganegara') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                            placeholder="Warga Negara" value="{{ old('warganegara') }}" />
                        @error('warganegara')
                            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Status Perkawinan</label>
                        <input type="text" name="status_perkawinan"
                            class="mt-1 px-3 py-2 @error('status_perkawinan') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                            placeholder="Status Perkawinan" value="{{ old('status_perkawinan') }}" />
                        @error('status_perkawinan')
                            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Agama</label>
                        <input type="text" name="agama"
                            class="mt-1 px-3 py-2 @error('agama') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                            placeholder="Agama" value="{{ old('agama') }}" />
                        @error('agama')
                            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Pekerjaan</label>
                        <input type="text" name="pekerjaan"
                            class="mt-1 px-3 py-2 @error('pekerjaan') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                            placeholder="Pekerjaan" value="{{ old('pekerjaan') }}" />
                        @error('pekerjaan')
                            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nomor KK</label>
                        <input type="text" name="no_kk"
                            class="mt-1 px-3 py-2 @error('no_kk') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                            placeholder="Nomor KK" value="{{ old('no_kk') }}" />
                        @error('no_kk')
                            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">NIK</label>
                        <input type="text" name="nik"
                            class="mt-1 px-3 py-2 @error('nik') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                            placeholder="NIK" value="{{ old('nik') }}" />
                        @error('nik')
                            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Alamat</label>
                        <input type="text" name="alamat"
                            class="mt-1 px-3 py-2 @error('alamat') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                            placeholder="Alamat" value="{{ old('alamat') }}" />
                        @error('alamat')
                            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div
                    class="w-full
                [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm">
                   
                    <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Jenis Usaha</label>
                        <input type="text" name="jenis_usaha"
                            class="mt-1 px-3 py-2 @error('jenis_usaha') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                            placeholder="Jenis Usaha" value="{{ old('jenis_usaha') }}" />
                        @error('jenis_usaha')
                            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-6">
                        <label class="after:ml-0.5 after:text-danger">Sudah Berapa Lama Usaha ini di Jalankan</label>
                        <input type="text" name="selama"
                            class="mt-1 px-3 py-2 @error('selama') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                            placeholder="Sudah Berapa Lama Usaha ini di Jalankan" value="{{ old('selama') }}" />
                        @error('selama')
                            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-6">
                        <label class="after:ml-0.5 after:text-danger">Alamat Usaha</label>
                        <input type="text" name="alamat_usaha"
                            class="mt-1 px-3 py-2 @error('alamat_usaha') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                            placeholder="Alamat Usaha" value="{{ old('alamat_usaha') }}" />
                        @error('alamat_usaha')
                            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-6">
                        <label class="after:ml-0.5 after:text-danger">Keperluan Surat</label>
                        <input type="text" name="keperluan_surat"
                            class="mt-1 px-3 py-2 @error('keperluan_surat') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                            placeholder="Keperluan Surat" value="{{ old('keperluan_surat') }}" />
                        @error('keperluan_surat')
                            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Foto surat Pengantar RT</label>
                        <input type="file" name="fotoketeranganrt"
                            class="mt-1 px-3 py-2 @error('fotoketeranganrt') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                            accept="image/*" />
                        @error('fotoketeranganrt')
                            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Foto KTP</label>
                        <input type="file" name="fotoktp"
                            class="mt-1 px-3 py-2 @error('fotoktp') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                            accept="image/*" />
                        @error('fotoktp')
                            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Foto KK</label>
                        <input type="file" name="fotokk"
                            class="mt-1 px-3 py-2 @error('fotokk') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                            accept="image/*" />
                        @error('fotokk')
                            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="flex flex-col mb-6">
                <label class="after:content-['*'] after:ml-0.5 after:text-danger">Keperluan Tanda Tangan</label>
                <div class="relative">
                    <select
                        class="appearance-none px-3 py-2 @error('kttd') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                        id="grid-state" name="kttd">
                        <option value="">Pilih Jenis Tanda Tangan</option>
                        <option value="basah">Tanda Tangan & Cap Basah</option>
                        <option value="barcode">Tanda Tangan Barcode</option>
                    </select>
                    <div
                        class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <i class='bx bx-chevron-down text-xl'></i>
                    </div>
                </div>
                @error('kttd')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                @enderror
            </div>
            <div class="w-full mb-6">
                <label class="after:ml-0.5 after:text-danger">Pesan</label>
                <small class="text-secondary">Pastikan sampaikan pesan kepada admin/petugas dengan jelas
                    untuk mempercepat pembuatan surat</small>
                <textarea id="keterangan" name="pesan" rows="4"
                    class="px-3 py-2 focus:outline-none @error('pesan') border-danger @else border-gray @enderror focus:border-gray focus:ring-gray"
                    placeholder="Masukkan pesan surat atau pesan anda kepada petugas.">{{ old('pesan') }}</textarea>
                @error('pesan')
                    <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end">
                <button type="submit"
                    class="text-white bg-danger focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">Submit</button>
            </div>
        </form>
    </div>
@endsection
