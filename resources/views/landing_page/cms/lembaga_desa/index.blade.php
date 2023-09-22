@extends('landing_page.cms.layouts.app')
@section('content')
    <div class="container-fluid ">

        @if (session('success'))
            <div class="alert alert-success mt-3" role="alert">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger mt-3" role="alert">
                {{ session('error') }}
            </div>
        @endif

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4 col-md-12">
            <h1 class="h3 mb-0 text-gray-800">Data Lembaga Desa</h1>
            <a href="{{ route('cms.lembaga-desa.create') }}" class="btn btn-sm btn-primary shadow-sm mt-3 mt-md-0 mt-lg-0">
                <i class="fas fa-plus-circle"></i>
                Buat Lembaga Desa</a>
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

        <div class="card shadow mb-4 col-md-12">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Lembaga Desa</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Lembaga</th>
                                <th>Dasar Hukum / SK Pembentukan</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($lembagas as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama_lembaga }}</td>
                                    <td>{{ $item->dasar_hukum }}</td>
                                    <td>{{ $item->alamat_kantor }}</td>
                                    <td>
                                        <div class="d-flex justify-content-evenly">
                                            <div class="pr-2">
                                                <a target="blank" href="{{ route('pemerintah.lembaga.detail', $item->id) }}"
                                                    class="btn btn-info btn-sm me-3">Lihat</a>
                                            </div>
                                            <div class="pr-2">
                                                <a href="{{ route('cms.lembaga-desa.edit', $item->id) }}"
                                                    class="btn btn-primary btn-sm me-3">Edit</a>
                                            </div>
                                            <form action="{{ route('cms.lembaga-desa.destroy', $item->id) }}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('addon-style')
    <link href="{{ url('') }}/cms/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush
@push('addon-script')
    <!-- Page level plugins -->
    <script src="{{ url('') }}/cms/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ url('') }}/cms/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="{{ url('') }}/cms/js/demo/datatables-demo.js"></script>
@endpush
