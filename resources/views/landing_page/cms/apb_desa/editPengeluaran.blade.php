@extends('landing_page.cms.layouts.app')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data APB Desa</h1>
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

        <div class="row mb-5">
            <div class="col-md-12 ">
                <form action="{{ route('cms.apb.updatePengeluaran', $apb->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-header">
                            <h6>Edit APB Desa</h6>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="judulPengeluaran" class="form-label">judul Pengeluaran<span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="judulPengeluaran" value="{{ old('judulPengeluaran', $apb->judulPengeluaran) }}"
                                        class="form-control" id="judulPengeluaran" placeholder="Masukkan judul Pengeluaran">
                                </div>
                                <div class="col-md-4">
                                    <label for="pengeluaran" class="form-label">Pengeluaran<span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="pengeluaran" value="{{ old('pengeluaran', $apb->pengeluaran) }}"
                                        class="form-control" id="pengeluaran" placeholder="Masukkan Pengeluaran">
                                </div>
                                <div class="col-md-4">
                                    <label for="gambar" class="form-label">Gambar</label>
                                    <input type="file" name="gambar" value="{{ old('gambar') }}" class="form-control"
                                        id="gambar" placeholder="Masukkan gambar">
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary col-12 mt-4">Submit</button>
                </form>
            </div>
        </div>

    </div>
@endsection
