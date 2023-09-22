@extends('landing_page.cms.layouts.app')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Galeri</h1>
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
                    <h6>Tambah Galeri</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('cms.galeri.update', $galeri->id) }}" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="judul" class="form-label">Judul Singkat <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="judul" value="{{ old('judul', $galeri->judul) }}"
                                    class="form-control" id="judul"
                                    placeholder="Masukkan judul singkat dari foto tersebut">
                            </div>

                            <div class="mb-3">
                                <img src="{{ asset($galeri->gambar) }}" width="200" alt="">
                                <br>
                                <br>
                                <label for="gambar" class="form-label">Foto</label>
                                <input type="file" name="gambar" value="{{ old('gambar') }}" class="form-control"
                                    id="gambar">
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
