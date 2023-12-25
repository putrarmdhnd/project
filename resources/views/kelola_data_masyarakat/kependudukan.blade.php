@extends('templates/dashboard')

<div class="mx-auto w-full mt-24 px-10 lg:px-4">
    <div class=" bg-white py-2 mb-5 rounded-lg row">
        <div class="col-12">
            <h1 class="text-lg lg:text-2xl headDash fw-bolder mb-2">Data Penduduk Desa Palasari</h1>
        </div>

        <div class="col-12 my-5 mx-0">
            <table class="table table-bordered">
                <thead class="bg-primary text-white">
                    <tr>
                        <th rowspan="2" class="text-center">No</th>
                        <th rowspan="2" class="text-center">Indikator IDM</th>
                        <th rowspan="2" class="text-center">Skor</th>
                        <th rowspan="2" class="text-center">Keterangan</th>
                        <th rowspan="2" class="text-center">Kegiatan yang dapat dilakukan</th>
                        <th rowspan="2" class="text-center">Nilai+</th>
                        <th colspan="6" class="text-center">Yang dapat melaksanakan kegiatan</th>
                    </tr>
                    <tr>
                        <th class="text-center">Pusat</th>
                        <th class="text-center">Provinsi</th>
                        <th class="text-center">Kab.</th>
                        <th class="text-center">Desa</th>
                        <th class="text-center">CSR</th>
                        <th class="text-center">Lainnya</th>
                    </tr>
                </thead>
                <!-- Add your table body content here -->
            </table>
        </div>
    </div>

</div>