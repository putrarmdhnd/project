@extends('templates/dashboard')
@section('content')
    <div class="bg-white py-6 px-9 mb-5 rounded-lg">
        <form action="{{ route('data.store') }}" method="POST" enctype="multipart/form-data"
            class="
    [&>div>label]:block [&>div>label]:mb-2 [&>div>label]:text-sm [&>div>label]:font-medium [&>div>label]:text-dark 
    [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm
    [&>div>div>select]:border [&>div>div>select]:p-2.5 [&>div>div>select]:shadow-sm [&>div>div>select]:placeholder-secondary [&>div>div>select]:text-secondary [&>div>div>select]:w-full [&>div>div>select]:block [&>div>div>select]:rounded-lg [&>div>div>select]:sm:text-sm
    [&>div>textarea]:text-secondary [&>div>textarea]:rounded-lg [&>div>textarea]:text-sm [&>div>textarea]:block [&>div>textarea]:w-full [&>div>textarea]:border [&>div>textarea]:shadow-sm ">
            @csrf

            <h1 class="text-2xl text-center my-8">Form Pengisian Data Kependudukan</h1>
            <div class="flex flex-col lg:flex-row gap-5 justify-center">
                <div
                    class="w-full 
                [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm
                
                ">
                    <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nomor KK</label>
                        <input type="text" name="noKK"
                            class="mt-1 px-3 py-2 @error('noKK') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                            placeholder="Nomor KK" value="{{ old('noKK') }}" />
                        @error('noKK')
                            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Lengkap</label>
                        <input type="text" name="namaLengkap"
                            class="mt-1 px-3 py-2 @error('namaLengkap') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                            placeholder="Nama Lengkap" value="{{ old('namaLengkap') }}" />
                        @error('namaLengkap')
                            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nomor Induk Kependudukan</label>
                        <input type="text" name="NIK"
                            class="mt-1 px-3 py-2 @error('NIK') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                            placeholder="Nomor Induk Kependudukan" value="{{ old('NIK') }}" />
                        @error('NIK')
                            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Jenis Kelamin</label>
                        <input type="text" name="jk"
                            class="mt-1 px-3 py-2 @error('jk') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                            placeholder="Jenis Kelamin" value="{{ old('jk') }}" />
                        @error('jk')
                            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Tempat Lahir</label>
                        <input type="text" name="tempatLahir"
                            class="mt-1 px-3 py-2 @error('tempatLahir') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                            placeholder="Tempat Lahir" value="{{ old('tempatLahir') }}" />
                        @error('tempatLahir')
                            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Tanggal Lahir</label>
                        <input type="text" name="tanggalLahir"
                            class="mt-1 px-3 py-2 @error('tanggalLahir') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                            placeholder="Tanggal Lahir" value="{{ old('tanggalLahir') }}" />
                        @error('tanggalLahir')
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
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Pendidikan</label>
                        <input type="text" name="pendidikan"
                            class="mt-1 px-3 py-2 @error('pendidikan') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                            placeholder="Pendidikan" value="{{ old('pendidikan') }}" />
                        @error('pendidikan')
                            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Jenis Pekerjaan</label>
                        <input type="text" name="jenisPekerjaan"
                            class="mt-1 px-3 py-2 @error('jenisPekerjaan') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                            placeholder="Jenis Pekerjaan" value="{{ old('jenisPekerjaan') }}" />
                        @error('jenisPekerjaan')
                            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Golongan Darah</label>
                        <input type="text" name="goldar"
                            class="mt-1 px-3 py-2 @error('goldar') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                            placeholder="Golongan Darah" value="{{ old('goldar') }}" />
                        @error('goldar')
                            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Status Perkawinan</label>
                        <input type="text" name="statusPerkawinan"
                            class="mt-1 px-3 py-2 @error('statusPerkawinan') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                            placeholder="Status Perkawinan" value="{{ old('statusPerkawinan') }}" />
                        @error('statusPerkawinan')
                            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Tanggal Perkawinan</label>
                        <input type="text" name="tanggalPerkawinan"
                            class="mt-1 px-3 py-2 @error('tanggalPerkawinan') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                            placeholder="Tanggal Perkawinan" value="{{ old('tanggalPerkawinan') }}" />
                        @error('tanggalPerkawinan')
                            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Status Hubungan</label>
                        <input type="text" name="statusHubungan"
                            class="mt-1 px-3 py-2 @error('statusHubungan') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                            placeholder="Status Hubungan" value="{{ old('statusHubungan') }}" />
                        @error('statusHubungan')
                            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Kewarganegaraan</label>
                        <input type="text" name="kewarganegaraan"
                            class="mt-1 px-3 py-2 @error('kewarganegaraan') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                            placeholder="Kewarganegaraan" value="{{ old('kewarganegaraan') }}" />
                        @error('kewarganegaraan')
                            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nomor Paspor</label>
                        <input type="text" name="noPaspor"
                            class="mt-1 px-3 py-2 @error('noPaspor') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                            placeholder="Nomor Paspor" value="{{ old('noPaspor') }}" />
                        @error('noPaspor')
                            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div
                    class="w-full 
                [&>div>input]:border [&>div>input]:p-2.5 [&>div>input]:shadow-sm [&>div>input]:placeholder-secondary [&>div>input]:text-secondary [&>div>input]:w-full [&>div>input]:block [&>div>input]:rounded-lg [&>div>input]:sm:text-sm
                [&>div>div>select]:border [&>div>div>select]:p-2.5 [&>div>div>select]:shadow-sm [&>div>div>select]:placeholder-secondary [&>div>div>select]:text-secondary [&>div>div>select]:w-full [&>div>div>select]:block [&>div>div>select]:rounded-lg [&>div>div>select]:sm:text-sm
                ">
                    <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nomor Kitap</label>
                        <input type="text" name="noKitap"
                            class="mt-1 px-3 py-2 @error('noKitap') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                            placeholder="Nomor Kitap" value="{{ old('noKitap') }}" />
                        @error('noKitap')
                            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Ayah</label>
                        <input type="text" name="namaAyah"
                            class="mt-1 px-3 py-2 @error('namaAyah') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                            placeholder="nama Ayah" value="{{ old('namaAyah') }}" />
                        @error('namaAyah')
                            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Ibu</label>
                        <input type="text" name="namaIbu"
                            class="mt-1 px-3 py-2 @error('namaIbu') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                            placeholder="nama Ibu" value="{{ old('namaIbu') }}" />
                        @error('namaIbu')
                            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Nama Kepala Keluarga</label>
                        <input type="text" name="namaKepalaKeluarga"
                            class="mt-1 px-3 py-2 @error('namaKepalaKeluarga') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                            placeholder="Nama Kepala Keluarga" value="{{ old('namaKepalaKeluarga') }}" />
                        @error('namaKepalaKeluarga')
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
                    
                    <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">RT</label>
                        <input type="text" name="rt"
                            class="mt-1 px-3 py-2 @error('rt') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                            placeholder="Rt" value="{{ old('rt') }}" />
                        @error('rt')
                            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">RW</label>
                        <input type="text" name="rw"
                            class="mt-1 px-3 py-2 @error('rw') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                            placeholder="RW" value="{{ old('rw') }}" />
                        @error('rw')
                            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Kode Pos</label>
                        <input type="text" name="kodePos"
                            class="mt-1 px-3 py-2 @error('kodePos') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                            placeholder="Kode Pos" value="{{ old('kodePos') }}" />
                        @error('kodePos')
                            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Desa</label>
                        <input type="text" name="desa"
                            class="mt-1 px-3 py-2 @error('desa') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                            placeholder="Desa" value="{{ old('desa') }}" />
                        @error('desa')
                            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Kecamatan</label>
                        <input type="text" name="kecamatan"
                            class="mt-1 px-3 py-2 @error('kecamatan') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                            placeholder="Kecamatan" value="{{ old('kecamatan') }}" />
                        @error('kecamatan')
                            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Kabupaten</label>
                        <input type="text" name="kabupaten"
                            class="mt-1 px-3 py-2 @error('kabupaten') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                            placeholder="Kabupaten" value="{{ old('kabupaten') }}" />
                        @error('kabupaten')
                            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Provinsi</label>
                        <input type="text" name="provinsi"
                            class="mt-1 px-3 py-2 @error('provinsi') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                            placeholder="Provinsi" value="{{ old('provinsi') }}" />
                        @error('provinsi')
                            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Tanggal Di Keluarkan</label>
                        <input type="text" name="tanggalDikeluarkan"
                            class="mt-1 px-3 py-2 @error('tanggalDikeluarkan') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                            placeholder="Tanggal Di Keluarkan" value="{{ old('tanggalDikeluarkan') }}" />
                        @error('tanggalDikeluarkan')
                            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Type Penduduk</label>
                        <input type="text" name="tipePenduduk"
                            class="mt-1 px-3 py-2 @error('tipePenduduk') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                            placeholder="Type Penduduk" value="{{ old('tipePenduduk') }}" />
                        @error('tipePenduduk')
                            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-6">
                        <label class="after:content-['*'] after:ml-0.5 after:text-danger">Status NIK</label>
                        <input type="text" name="statusNik"
                            class="mt-1 px-3 py-2 @error('statusNik') border-danger @else border-gray @enderror focus:outline-none focus:border-gray focus:ring-gray focus:ring-1"
                            placeholder="Status NIK" value="{{ old('statusNik') }}" />
                        @error('statusNik')
                            <p class="mt-1 text-xs text-danger" id="file_input_help">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <br>
            <br>


            <div class="flex justify-end">
                <button type="submit"
                    class="text-white bg-danger focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center">Submit</button>
            </div>
        </form>
    </div>
@endsection
