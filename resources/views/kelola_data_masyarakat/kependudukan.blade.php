@extends('templates/dashboard')

<div class="mx-auto w-full mt-24 px-10 lg:px-4">
    <div class="bg-white py-2 mb-5 rounded-lg">
        <div class="row d-flex align-items-center">
            <div class="col-8">
                <h1 class="text-lg lg:text-2xl headDash fw-bolder mb-2">Data Penduduk Desa Palasari</h1>
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
            <div class="col-9 d-flex mt-5">
                <div class="w-100 me-2">
                    <input type="text" id="searchInput" class="form-control" placeholder="Search">
                </div>

            </div>
            <div class="col-3 d-flex mt-5 gap-2">
                <a href="/data/input" class="text-black focus:outline-none font-medium rounded-lg text-sm px-4 py-2.5 text-center text-decoration-none" style="background-color: #b7efff;">Tambah Data</a>
                <a href="#" class="text-black focus:outline-none font-medium rounded-lg text-sm px-4 py-2.5 text-center text-decoration-none" style="background-color: #b7efff;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Import Data
                </a>
            </div>

        </div>

    </div>
</div>


<div class="col-12 my-5 mx-0">
    <table id="pendudukTable" class="table table-bordered border ">
        <thead class="themeColor text-white">
            <tr>
                <th rowspan="2" class="text-center align-middle font-table">No</th>
                <th rowspan="2" class="text-center align-middle font-table">No KK</th>
                <th rowspan="2" class="text-center align-middle font-table">NIK</th>
                <th rowspan="2" class="text-center align-middle font-table">Nama</th>
                <th rowspan="2" class="text-center align-middle font-table">Jenis Kelamin</th>
                <th colspan="2" class="text-center align-middle font-table">Kelahiran</th>
                <th colspan="6" class="text-center align-middle font-table">Tempat Tinggal</th>
                <th colspan="2" class="text-center align-middle font-table">Aksi</th>
            </tr>
            <tr>
                <th class="text-center align-middle font-table">Tempat</th>
                <th class="text-center align-middle font-table">Tanggal</th>
                <th class="text-center align-middle font-table">Alamat</th>
                <th class="text-center align-middle font-table">RT</th>
                <th class="text-center align-middle font-table">RW</th>
                <th class="text-center align-middle font-table">Desa</th>
                <th class="text-center align-middle font-table">Kec.</th>
                <th class="text-center align-middle font-table">Kab.</th>
                <th class="text-center align-middle font-table">Detail</th>
                <th class="text-center align-middle font-table">Hapus</th>
            </tr>
        </thead>
        <tbody>
            <!-- Example row, replace with your actual data -->
            @foreach($penduduk as $item)
            <tr>
                <td class="text-center align-middle font-table">{{ $item->id }}</td>
                <td class="text-center align-middle font-table">{{ $item->noKK }}</td>
                <td class="text-center align-middle font-table">{{ $item->NIK }}</td>
                <td class="text-center align-middle font-table">{{ $item->namaLengkap }}</td>
                <td class="text-center align-middle font-table">{{ $item->jk }}</td>
                <td class="text-center align-middle font-table">{{ $item->tempatLahir }}</td>
                <td class="text-center align-middle font-table">{{ $item->tanggalLahir }}</td>
                <td class="text-center align-middle font-table">{{ $item->alamat }}</td>
                <td class="text-center align-middle font-table">{{ $item->rt }}</td>
                <td class="text-center align-middle font-table">{{ $item->rw }}</td>
                <td class="text-center align-middle font-table">{{ $item->desa }}</td>
                <td class="text-center align-middle font-table">{{ $item->kecamatan }}</td>
                <td class="text-center align-middle font-table">{{ $item->kabupaten }}</td>
                <td class="text-center align-middle font-table">
                    <button class="text-primary text-center detailKependudukan" data-user="">
                        <i class='bx bx-edit-alt'></i>
                    </button>
                </td>
                <td class="text-center align-middle font-table">
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