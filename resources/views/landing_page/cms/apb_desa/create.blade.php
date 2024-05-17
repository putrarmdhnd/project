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
                <form action="{{ route('cms.apb.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="type" value="apb"> <!-- Tambahkan input type -->
                    <div class="card">
                        <div class="card-header">
                            <h6>Tambah APB Desa</h6>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="tahun" class="form-label">Tahun <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="tahun" value="{{ old('tahun') }}" class="form-control"
                                        id="tahun" placeholder="Masukkan tahun">
                                </div>
                                <div class="col-md-4">
                                    <label for="anggaran" class="form-label">Jumlah Anggaran</label>
                                    <input type="text" name="anggaran" value="{{ old('anggaran') }}" class="form-control"
                                        id="anggaran" placeholder="Masukkan Anggaran">
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
