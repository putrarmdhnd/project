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

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h6>Tambah Data Pegawai</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('cms.pegawai.store') }}" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            @csrf
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama <span class="text-danger">*</span></label>
                                <input type="text" name="nama" value="{{ old('nama') }}" class="form-control"
                                    id="nama" placeholder="Masukkan nama pegawai">
                            </div>
                            <div class="mb-3">
                                <label for="ttl" class="form-label">Tempat Tanggal Lahir <span class="text-danger">*</span></label>
                                <input type="text" name="ttl" value="{{ old('ttl') }}" class="form-control"
                                    id="ttl" placeholder="Masukkan Tempat Tanggal Lahir pegawai">
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                                <input type="text" name="status" value="{{ old('status') }}" class="form-control"
                                    id="status" placeholder="Masukkan Status pegawai">
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat <span class="text-danger">*</span></label>
                                <input type="text" name="alamat" value="{{ old('alamat') }}" class="form-control"
                                    id="alamat" placeholder="Masukkan Alamat pegawai">
                            </div>
                            <div class="mb-3">
                                <label for="pendidikan" class="form-label">Pendidikan Trakhir</label>
                                <input type="text" name="pendidikan" value="{{ old('pendidikan') }}" class="form-control"
                                    id="pendidikan" placeholder="Masukkan Pendidikan pegawai">
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
