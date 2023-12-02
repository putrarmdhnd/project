@extends('landing_page.cms.layouts.app')
@section('content')
<div class="container w-full mx-auto px-10 lg:px-4">

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
    <div class="bg-white py-4 px-9 mb-3 rounded-lg flex justify-between items-center">
        <div class="">
            <h1 class="text-lg lg:text-2xl headDash font-bold mb-2">Berita & Pengumuman</h1>
            <p class="text-base font-normal text-secondary">Data dari setiap berita dan pengumuman desa</p>
        </div>
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

    <div class="card ">
        <div class="card-header bg-white py-3">
            <a href="{{ route('cms.berita.create') }}" class="btn btn-sm btn-primary shadow-sm mt-3 mt-md-0 mt-lg-0"><i class="fas fa-plus-circle"></i>
                Buat Berita</a>
        </div>
        <div class="card-body">
            <div class="w-full rounded-lg bg-white divide-y divide-gray overflow-hidden mb-5">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th>No</th>
                            <th>Waktu Berita</th>
                            <th>Thumbnail</th>
                            <th>Judul</th>
                            <th>Tipe</th>
                            <th>Author</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody class="text-center">
                        @foreach ($beritas as $berita)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $berita->created_at }}</td>
                            <td>
                                <img src="{{ asset($berita->gambar ? 'storage/' . $berita->gambar : 'img/no-picture.png') }}" width="180" alt="" class="mx-auto d-block">
                            </td>
                            <td width="30%">
                                {{ $berita->judul }}
                            </td>
                            <td>
                                {{ $berita->tipe }}
                            </td>
                            <td> {{ $berita->author->nama }} </td>
                            <td>
                                <a target="blank" href="{{ route('informasi.berita.detail', $berita->slug) }}" class="btn btn-info btn-sm w-full">Detail</a>

                                <form action="{{ route('cms.berita.destroy', $berita->id) }}" method="post" class="d-flex justify-center">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm mt-2 mx-1"><i class="bx bxs-trash"></i></button>

                                    <a href="{{ route('cms.berita.edit', $berita->id) }}" class="btn btn-primary btn-sm mt-2 mx-1"><i class='bx bx-edit-alt'></i></a>
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