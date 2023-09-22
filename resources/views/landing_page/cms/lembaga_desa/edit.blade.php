@extends('landing_page.cms.layouts.app')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Lembaga Desa</h1>
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

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h6>Edit Data Lembaga</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('cms.lembaga-desa.update',$lembagaDesa->id) }}" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <img src="{{ asset($lembagaDesa->logo ?: 'img/no-image.png') }}" alt="Logo Lembaga"
                                    width="100">
                                <br>
                                <br>
                                <label for="logo" class="form-label">Logo</label>
                                <input type="file" name="logo" value="{{ old('logo') }}" class="form-control"
                                    id="logo" placeholder="Masukkan logo lembaga">
                            </div>
                            <div class="mb-3">
                                <label for="nama_lembaga" class="form-label">Nama Lembaga<span
                                        class="text-danger">*</span></label>
                                <input type="text" name="nama_lembaga" value="{{ old('nama_lembaga',$lembagaDesa->nama_lembaga) }}"
                                    class="form-control" id="nama_lembaga" placeholder="Masukkan nama lembaga">
                            </div>
                            <div class="mb-3">
                                <label for="singkatan" class="form-label">Kependekan Lembaga <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="singkatan" value="{{ old('singkatan',$lembagaDesa->singkatan) }}" class="form-control"
                                    id="singkatan" placeholder="Masukkan nama kependekan lembaga">
                            </div>
                            <div class="mb-3">
                                <label for="dasar_hukum" class="form-label">Dasar Hukum / SK Pembentukan</label>
                                <input type="text" name="dasar_hukum" value="{{ old('dasar_hukum',$lembagaDesa->dasar_hukum) }}"
                                    class="form-control" id="dasar_hukum"
                                    placeholder="Masukkan dasar hukum / SK pembentukan">
                            </div>
                            <div class="mb-3">
                                <label for="alamat_kantor" class="form-label">Alamat Kantor <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="alamat_kantor" value="{{ old('alamat_kantor',$lembagaDesa->alamat_kantor) }}"
                                    class="form-control" id="alamat_kantor" placeholder="Masukkan alamat kantor">
                            </div>
                            <div class="mb-3">
                                <label for="editor" class="form-label">Profil Lembaga</label>
                                <textarea name="profil" id="editor" rows="10">
                                    {{ old('profil',$lembagaDesa->profil) }}
                                </textarea>
                            </div>
                            <div class="mb-3">
                                <label for="editor" class="form-label">Visi Misi</label>
                                <textarea name="visi_misi" id="editor2" rows="10">
                                    {{ old('visi_misi',$lembagaDesa->visi_misi) }}
                                </textarea>
                            </div>

                            <div class="mb-3">
                                <label for="editor" class="form-label"> Tugas Pokok & Fungsi</label>
                                <textarea name="tugas_fungsi" id="editor3" rows="10">
                                    {{ old('tugas_fungsi',$lembagaDesa->tugas_fungsi) }}
                                </textarea>
                            </div>
                            <div class="mb-3">
                                <label for="editor" class="form-label"> Kepengurusan</label>
                                <textarea name="kepengurusan" id="editor4" rows="10">
                                    {{ old('kepengurusan',$lembagaDesa->kepengurusan) }}
                                </textarea>
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


@push('addon-style')
    <style>
        .ck-editor__editable {
            min-height: 150px !important;
        }
    </style>
@endpush

@push('addon-script')
    <script src="https://cdn.ckeditor.com/ckeditor5/37.1.0/classic/ckeditor.js"></script>

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

        ClassicEditor
            .create(document.querySelector('#editor2'), {

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

        ClassicEditor
            .create(document.querySelector('#editor3'), {

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
        ClassicEditor
            .create(document.querySelector('#editor4'), {

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
    </script>
@endpush
