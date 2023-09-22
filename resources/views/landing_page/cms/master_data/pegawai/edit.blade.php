@extends('landing_page.cms.layouts.app')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Pegawai</h1>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="col-md-6 mb-3">
            <div class="card">
                <div class="card-header">
                    <h6>Edit Data Pegawai</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('cms.pegawai.update', $pegawai->id) }}" method="post"
                        enctype="multipart/form-data">
                        <div class="modal-body">
                            @csrf
                            @method('PUT')
                            <div class="mb-3 text-center">
                                <img src="{{ asset($pegawai->foto ? 'storage/' . $pegawai->foto : 'img/no-image.png') }}"
                                    width="150" alt="{{ $pegawai->nama }}">
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama <span class="text-danger">*</span></label>
                                <input type="text" name="nama" value="{{ old('nama', $pegawai->nama) }}"
                                    class="form-control" id="nama" placeholder="Masukkan nama pegawai">
                            </div>
                            <div class="mb-3">
                                <label for="nip" class="form-label">NIP</label>
                                <input type="text" name="nip" value="{{ old('nip', $pegawai->nip) }}"
                                    class="form-control" id="nip" placeholder="Masukkan nip pegawai">
                            </div>
                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <input type="text" name="keterangan"
                                    value="{{ old('keterangan', $pegawai->keterangan) }}" class="form-control"
                                    id="keterangan" placeholder="Masukkan keterangan pegawai">
                            </div>
                            <div class="mb-3">
                                <label for="foto" class="form-label">Foto</label>
                                <input type="file" name="foto" value="{{ old('foto') }}" class="form-control"
                                    id="foto" placeholder="Masukkan foto pegawai">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
