@extends('templates/dashboard')

@section('content')

<div class="layoutWelcome bg-white py-4 px-9 mb-5 rounded-lg">
    <div class="row align-items-center">
        <div class="col-8">
            <h1 class="text-lg lg:text-2xl headDash fw-bolder mb-2">Data Penduduk Desa Palasari</h1>
            <p class="textDashboard text-base text-[13px] lg:text-lg font-normal text-secondary">Semua data dari masyarakat Desa Palasari Kecamatan Cipanas</p>
        </div>
        <div class="col-4 d-flex justify-content-center">
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="/data/import" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <input type="file" name="file" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex gap-3">
            <div class="col-9 mt-5 ">
                <div class="w-100 me-2">
                    <input type="text" id="searchInput" class="form-control" placeholder="Search">
                </div>

            </div>
            <div class="col-4 mt-5 gap-2 align-items-center pt-1">
                <a href="/data/input" class="text-black focus:outline-none font-medium rounded-lg text-sm px-4 py-2.5 text-center text-decoration-none" style="background-color: #b7efff;">Tambah Data</a>
                <a href="#" class="text-black focus:outline-none font-medium rounded-lg text-sm px-4 py-2.5 text-center text-decoration-none" style="background-color: #b7efff;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Import Data
                </a>
            </div>
        </div>
    </div>
</div>

<div class="overflow-x-auto">
    <table id="pendudukTable" class="table table-bordered border w-full rounded-lg bg-white divide-y divide-gray overflow-hidden">
        <thead class="themeColor text-white text-center">
            <tr>
                <th rowspan="2" class="textTabelTop font-semibold text-sm uppercase px-4 py-4 align-middle">No</th>
                <th rowspan="2" class="textTabelTop font-semibold text-sm uppercase px-4 py-4 align-middle">No KK</th>
                <th rowspan="2" class="textTabelTop font-semibold text-sm uppercase px-4 py-4 align-middle">NIK</th>
                <th rowspan="2" class="textTabelTop font-semibold text-sm uppercase px-4 py-4 align-middle">Nama</th>
                <th rowspan="2" class="textTabelTop font-semibold text-sm uppercase px-4 py-4 align-middle">Jenis Kelamin</th>
                <th colspan="2" class="textTabelTop font-semibold text-sm uppercase px-4 py-4 align-middle">Kelahiran</th>
                <th colspan="6" class="textTabelTop font-semibold text-sm uppercase px-4 py-4 align-middle">Tempat Tinggal</th>
                <th colspan="2" class="textTabelTop font-semibold text-sm uppercase px-4 py-4 align-middle">Aksi</th>
            </tr>
            <tr>
                <th class="textTabelTop font-semibold text-sm uppercase px-4 py-4 align-middle">Tempat</th>
                <th class="textTabelTop font-semibold text-sm uppercase px-4 py-4 align-middle">Tanggal</th>
                <th class="textTabelTop font-semibold text-sm uppercase px-4 py-4 align-middle">Alamat</th>
                <th class="textTabelTop font-semibold text-sm uppercase px-4 py-4 align-middle">RT</th>
                <th class="textTabelTop font-semibold text-sm uppercase px-4 py-4 align-middle">RW</th>
                <th class="textTabelTop font-semibold text-sm uppercase px-4 py-4 align-middle">Desa</th>
                <th class="textTabelTop font-semibold text-sm uppercase px-4 py-4 align-middle">Kec.</th>
                <th class="textTabelTop font-semibold text-sm uppercase px-4 py-4 align-middle">Kab.</th>
                <th class="textTabelTop font-semibold text-sm uppercase px-4 py-4 align-middle">Detail</th>
                <th class="textTabelTop font-semibold text-sm uppercase px-4 py-4 align-middle">Hapus</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray">
            <!-- Example row, replace with your actual data -->
            @foreach($penduduk as $item)
            <tr>
                <td class="textTable px-2 py-4 text-secondary">{{ $item->id }}</td>
                <td class="textTable px-2 py-4 text-secondary">{{ $item->noKK }}</td>
                <td class="textTable px-2 py-4 text-secondary">{{ $item->NIK }}</td>
                <td class="textTable px-2 py-4 text-secondary">{{ $item->namaLengkap }}</td>
                <td class="textTable px-2 py-4 text-secondary">{{ $item->jk }}</td>
                <td class="textTable px-2 py-4 text-secondary">{{ $item->tempatLahir }}</td>
                <td class="textTable px-2 py-4 text-secondary">{{ $item->tanggalLahir }}</td>
                <td class="textTable px-2 py-4 text-secondary">{{ $item->alamat }}</td>
                <td class="textTable px-2 py-4 text-secondary">{{ $item->rt }}</td>
                <td class="textTable px-2 py-4 text-secondary">{{ $item->rw }}</td>
                <td class="textTable px-2 py-4 text-secondary">{{ $item->desa }}</td>
                <td class="textTable px-2 py-4 text-secondary">{{ $item->kecamatan }}</td>
                <td class="textTable px-2 py-4 text-secondary">{{ $item->kabupaten }}</td>
                <td class="textTable px-2 py-4 text-secondary">
                    <button class="text-primary text-center detailKependudukan" data-user="">
                        <i class='bx bx-edit-alt'></i>
                    </button>
                </td>
                <td class="textTable px-2 py-4 text-secondary">
                    <button class="text-danger text-center deletePenduduk" data-id="{{ $item->id }}">
                        <i class="bx bxs-trash"></i>
                    </button>
                </td>
            </tr>
            @endforeach
            <!-- Add more rows as needed -->
        </tbody>
    </table>

    <div class="d-flex justify-content-center mt-4">
        {{ $penduduk->links() }}
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#searchInput').on('keyup', function() {
                var value = $(this).val().toLowerCase();
                $('#pendudukTable tbody tr').filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            });
        });
    </script>

</div>

@endsection