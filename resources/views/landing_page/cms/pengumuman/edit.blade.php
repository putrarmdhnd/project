@extends('landing_page.cms.layouts.app')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Pengumuman</h1>
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
                    <h6>Edit Pengumuman</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('cms.pengumuman.update', $pengumuman->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul Pengumuman</label>
                            <input type="text" name="judul" value="{{ old('judul',$pengumuman->judul) }}" class="form-control"
                                id="judul" placeholder="Masukkan Judul Pengumuman">
                        </div>
                        <div class="mb-3">
                            @if ($pengumuman->gambar)
                                <div class="my-5">
                                    <img src="{{ asset($pengumuman->gambar ?: 'img/no-picture.png') }}" width="100" alt="">
                                    <label for="gambar" class="form-label">Thumbnail Saat ini</label>
                                </div>
                            @endif
                            <label for="gambar" class="form-label">Thumbnail</label>
                            <input type="file" name="gambar" class="form-control" id="gambar"
                                placeholder="Masukkan Thumnail Pengumuman">
                        </div>
                        
                        <div class="mb-3">
                            <label for="editor" class="form-label">Deskripsi Pengumuman</label>
                            <textarea name="deskripsi" id="editor" rows="10">
                                {{ old('deskripsi',$pengumuman->deskripsi) }}
                            </textarea>
                        </div>
                        <div class="mt-5 mb-3">
                            <button class="btn btn-primary">Upload Pengumuman</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('addon-style')
    <style>
        .ck-editor__editable {
            min-height: 350px !important;
        }
    </style>
@endpush

@push('addon-script')
    <script src="https://cdn.ckeditor.com/ckeditor5/37.1.0/classic/ckeditor.js"></script>
    {{-- <script src="https://ckeditor.com/apps/ckfinder/3.5.0/ckfinder.js"></script> --}}

    <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {

                ckfinder: {
                    uploadUrl: '{{ route('cms.ckeditor.upload') . '?_token=' . csrf_token() }}'
                },

                // make add custom css in table
                table: {
                    contentToolbar: [
                        'tableColumn',
                        'tableRow',
                        'mergeTableCells',
                        'tableProperties',
                        'tableCellProperties'
                    ]
                },
            })
            .then((result) => {
                console.log(result);
            }).catch((err) => {
                console.log(err);
            });
    </script>
@endpush
