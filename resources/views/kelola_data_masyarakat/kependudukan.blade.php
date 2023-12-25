@extends('templates/dashboard')

<div class="mx-auto w-full mt-24 px-10 lg:px-4">
    <div class="bg-white py-2 mb-5 rounded-lg">
        <div class="row d-flex align-items-center">
            <div class="col-8">
                <h1 class="text-lg lg:text-2xl headDash fw-bolder mb-2">Data Penduduk Desa Palasari</h1>
            </div>
            <div class="col-4 d-flex justify-content-center">
                <div class="row d-block"> <a href="" class="text-black focus:outline-none font-medium rounded-lg text-sm px-4 py-2.5 text-center text-decoration-none" style="background-color: #b7efff;">Tambah Data</a>
                    <a href="" class="text-black focus:outline-none font-medium rounded-lg text-sm px-4 py-2.5 text-center text-decoration-none" style="background-color: #b7efff;">Import Data</a>
                </div>
            </div>
        </div>
    </div>


    <div class="col-12 my-5 mx-0">
        <table class="table table-bordered border ">
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
                <tr>
                    <td class="text-center align-middle font-table">1</td>
                    <td class="text-center align-middle font-table">123456</td>
                    <td class="text-center align-middle font-table">1234567890123456</td>
                    <td class="text-center align-middle font-table">John Doe</td>
                    <td class="text-center align-middle font-table">Male</td>
                    <td class="text-center align-middle font-table">City</td>
                    <td class="text-center align-middle font-table">2023-01-01</td>
                    <td class="text-center align-middle font-table">123 Main St</td>
                    <td class="text-center align-middle font-table">01</td>
                    <td class="text-center align-middle font-table">02</td>
                    <td class="text-center align-middle font-table">Example Village</td>
                    <td class="text-center align-middle font-table">Example District</td>
                    <td class="text-center align-middle font-table">Example Regency</td>
                    <td class="text-center align-middle font-table">
                        <button class="text-primary text-center editPengguna" data-user="">
                            <i class='bx bx-edit-alt'></i>
                        </button>
                    </td>
                    <td class="text-center align-middle font-table">
                        <button class="text-danger text-center deletePengguna" data-id="">
                            <i class="bx bxs-trash"></i>
                        </button>
                    </td>
                </tr>
                <!-- Add more rows as needed -->
            </tbody>
        </table>




    </div>
</div>

</div>