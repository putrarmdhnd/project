@extends('landing_page.cms.layouts.app')
@section('content')
    <div class="container-fluid">

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
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Berita</h1>
            <a href="{{ route('cms.berita.create') }}" class="btn btn-sm btn-primary shadow-sm mt-3 mt-md-0 mt-lg-0"><i
                    class="fas fa-plus-circle"></i>
                Buat Berita</a>
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

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Berita</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Thumbnail</th>
                                <th>Judul</th>
                                <th>Tipe</th>
                                <th>Author</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($beritas as $berita)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $berita->created_at }}</td>
                                    <td>
                                        <img src="{{ asset($berita->gambar ? 'storage/' . $berita->gambar : 'img/no-picture.png') }}"
                                            width="200" alt="">
                                    </td>
                                    <td width="30%">
                                        {{ $berita->judul }}
                                    </td>
                                    <td>
                                        {{ $berita->tipe }}
                                    </td>
                                    <td> {{ $berita->author->nama }} </td>
                                    <td>
                                        <a target="blank" href="{{ route('informasi.berita.detail', $berita->slug) }}"
                                            class="btn btn-info btn-sm">Lihat</a>
                                        <a href="{{ route('cms.berita.edit', $berita->id) }}"
                                            class="btn btn-primary btn-sm">Edit</a>

                                        <form action="{{ route('cms.berita.destroy', $berita->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm mt-2">Hapus</button>
                                        </form>
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
