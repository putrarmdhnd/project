@extends('landing_page.cms.layouts.app')
@section('content')
<div class="container-fluid ">

    <!-- Page Heading -->

    <div class="bg-white py-4 px-9 mb-3 rounded-lg flex justify-between items-center">
        <div class="">
            <h1 class="text-lg lg:text-2xl headDash font-bold mb-2">Data Pegawai</h1>
            <p class="text-base font-normal text-secondary">Data dari setiap lengkap setiap pegawai Desa Palasari</p>
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

    <div class="card">
        <div class="card-header bg-white py-3">
            <div class="col-12">
                <div id="btn__up_mobileKependudukan" class="col-md-6 d-flex justify-content-end py-2">
                    <div class="layoutBtnPengaduan">
                        <a href="{{ route('cms.pegawai.create') }}" class="btnPengaduan text-black focus:outline-none font-medium rounded-lg text-sm px-4 py-2.5 text-center text-decoration-none" style="background-color: #b7efff;"><i class="fas fa-plus-circle"></i> Tambah Data</a>
                    </div>
                </div>
                <div class="row align-items-center py-2">
                    <div class="col-md-6 py-2">
                        <div class="input-group">
                            <input type="text" id="searchInput" class="form-control" placeholder="Search">
                        </div>
                    </div>
                    <div id="btn__down_largeKependudukan" class="col-md-6 d-flex justify-content-end py-2">
                        <div class="layoutBtnPengaduan">
                            <a href="{{ route('cms.pegawai.create') }}" class="btnPengaduan text-black focus:outline-none font-medium rounded-lg text-sm px-4 py-2.5 text-center text-decoration-none" style="background-color: #b7efff;"><i class="fas fa-plus-circle"></i> Tambah Data</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="w-full rounded-lg bg-white divide-y divide-gray overflow-x-auto mb-5">
                <table id="informasiTable" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="themeColor text-white text-center">
                        <tr>
                            <th class="textTabelTop font-semibold text-sm uppercase px-4 py-2 align-middle">No</th>
                            <th class="textTabelTop font-semibold text-sm uppercase px-4 py-2 align-middle">Nama</th>
                            <th class="textTabelTop font-semibold text-sm uppercase px-4 py-2 align-middle">Tempat Tanggal Lahir</th>
                            <th class="textTabelTop font-semibold text-sm uppercase px-4 py-2 align-middle">Alamat</th>
                            <th class="textTabelTop font-semibold text-sm uppercase px-4 py-2 align-middle">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($pegawais as $item)
                        <tr>
                            <td class="textTable px-2 py-4 text-secondary align-middle align-middle">{{ $loop->iteration }}</td>
                            <td class="textTable px-2 py-4 text-secondary align-middle align-middle">{{ $item->nama }}</td>
                            <td class="textTable px-2 py-4 text-secondary align-middle align-middle">{{ $item->ttl }}</td>
                            <td class="textTable px-2 py-4 text-secondary align-middle align-middle">{{ $item->alamat }}</td>
                            <td class="textTable px-2 py-4 text-secondary align-middle align-middle">
                                <div class="d-flex justify-content-evenly">
                                    <form action="{{ route('cms.pegawai.destroy', $item->id) }}" method="post" class="d-flex justify-center">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm mt-2 mx-1"><i class="bx bxs-trash"></i></button>

                                        <a href="{{ route('cms.pegawai.edit', $item->id) }}" class="btn btn-primary btn-sm mt-2 mx-1"><i class='bx bx-edit-alt'></i></a>
                                    </form>
                                </div>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('#searchInput').on('keyup', function() {
                        var value = $(this).val().toLowerCase();
                        $('#informasiTable tbody tr').filter(function() {
                            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                        });
                    });
                });
            </script>
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