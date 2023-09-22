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
        <div class="d-sm-flex align-items-center justify-content-between mb-4 col-md-">
            <h1 class="h3 mb-0 text-gray-800">Struktur Desa</h1>
            <div>
                <button type="button" class="btn btn-sm btn-primary shadow-sm mt-3 mt-md-0 mt-lg-0" data-toggle="modal"
                    data-target="#strukturDesaModal">
                    <i class="fas fa-plus-circle"></i>
                    Input Anggota</button>
                <button type="button" class="btn btn-sm btn-primary shadow-sm mt-3 mt-md-0 mt-lg-0" data-toggle="modal"
                    data-target="#gambarStrukturModal">
                    Upload Gambar Struktur
                </button>
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

        <div class="card shadow mb-4 col-md-12">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Struktur Desa</h6>
            </div>
            <div class="card-body row">
                <div class="col-md-6">
                    <img src="{{ asset('/storage/struktur_desa/struktur_desa.png') }}" width="600" class="img-fluid"
                        alt="Struktur Organisasi Desa">
                </div>
                <div class="col-md-6">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Level</th>
                                    <th>Jabatan</th>
                                    <th>Pegawai</th>
                                    <th>NIP</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($pegawais as $pegawai)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $pegawai->is_kepala_jabatan ? 'Kepala Jabatan' : 'Anggota' }}</td>
                                        <td>{{ $pegawai->jabatan_pegawai->nama }}</td>
                                        <td>{{ $pegawai->nama }}</td>
                                        <td>{{ $pegawai->nip }}</td>
                                        <td>
                                            <div class="d-flex justify-content-evenly">
                                                <div class="pr-2">
                                                    <a href="{{ route('cms.struktur-desa.edit', $pegawai->id) }}"
                                                        class="btn btn-primary btn-sm me-3">Edit</a>
                                                </div>

                                                <form action="{{ route('cms.struktur-desa.destroy', $pegawai->id) }}"
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
    </div>

    <!-- Modal -->
    <div class="modal fade" id="strukturDesaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Atur Struktur Desa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('cms.struktur-desa.store') }}" method="post">
                    <div class="modal-body">
                        @csrf
                        <div class="mb-3">
                            <label for="pegawai" class="form-label">Pegawai</label>
                            <select name="pegawai_id" class="form-control">
                                <option value="">-- Pilih Pegawai --</option>
                                @foreach ($pegawais_form as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="jabatan" class="form-label">Jabatan/Struktur</label>
                            <select name="jabatan_pegawai_id" class="form-control">
                                <option value="">-- Pilih Jabatan --</option>
                                @foreach ($jabatans as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 form-group form-check">
                            <input type="checkbox" name="is_kepala_jabatan" class="form-check-input" id="ketua">
                            <label class="form-check-label" for="ketua">Kepala Jabatan ?</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="gambarStrukturModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Atur Struktur Desa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('cms.struktur-desa.upload') }}" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <div class="mb-3">
                            <label for="image" class="form-label">Gambar Struktur Organisasi</label>
                            <input type="file" name="image" value="{{ old('image') }}" class="form-control"
                                id="image" placeholder="">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
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
