@extends('landing_page.cms.layouts.app')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data APB Desa</h1>
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

        <div class="row mb-5">
            <div class="col-md-12 ">
                <form action="{{ route('cms.apb.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h6>Tambah APB Desa</h6>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="judul" class="form-label">Judul <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="judul" value="{{ old('judul') }}" class="form-control"
                                        id="judul" placeholder="Masukkan judul">
                                </div>
                                <div class="col-md-4">
                                    <label for="tahun" class="form-label">Tahun <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="tahun" value="{{ old('tahun') }}" class="form-control"
                                        id="tahun" placeholder="Masukkan tahun">
                                </div>
                                <div class="col-md-4">
                                    <label for="gambar" class="form-label">Gambar</label>
                                    <input type="file" name="gambar" value="{{ old('gambar') }}" class="form-control"
                                        id="gambar" placeholder="Masukkan gambar">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-header">
                            <h6>1. Pendapatan Desa</h6>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <th></th>
                                    <th>Rencana / Anggaran</th>
                                    <th>Realisasi</th>
                                    <th>Lebih/Kurang</th>
                                </tr>
                                <tr>
                                    <th colspan="4">PENDAPATAN ASLI DESA</th>
                                </tr>
                                <tr>
                                    <td>Hasil Usaha</th>
                                    <td>
                                        <input type="number" name="hasil_usaha[rencana]" class="form-control"
                                            placeholder="Rp. 0">
                                    </td>
                                    <td>
                                        <input type="number" name="hasil_usaha[realisasi]" class="form-control"
                                            placeholder="Rp. 0">
                                    </td>
                                    <td>
                                        <input type="number" name="hasil_usaha[lebih]" class="form-control"
                                            placeholder="Rp. 0">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Hasil Aset</td>
                                    <td>
                                        <input type="number" name="hasil_aset[rencana]" class="form-control"
                                            placeholder="Rp. 0">
                                    </td>
                                    <td>
                                        <input type="number" name="hasil_aset[realisasi]" class="form-control"
                                            placeholder="Rp. 0">
                                    </td>
                                    <td>
                                        <input type="number" name="hasil_aset[lebih]" class="form-control"
                                            placeholder="Rp. 0">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Swadaya, Partisipasi, Gotong Royong</td>
                                    <td>
                                        <input type="number" name="hasil_lain[rencana]" class="form-control"
                                            placeholder="Rp. 0">
                                    </td>
                                    <td>
                                        <input type="number" name="hasil_lain[realisasi]" class="form-control"
                                            placeholder="Rp. 0">
                                    </td>
                                    <td>
                                        <input type="number" name="hasil_lain[lebih]" class="form-control"
                                            placeholder="Rp. 0">
                                    </td>
                                </tr>
                                <tr>
                                    <th colspan="4">PENDAPATAN TRANSFER</th>
                                </tr>
                                <tr>
                                    <td>Dana Desa</td>
                                    <td>
                                        <input type="number" name="dana_desa[rencana]" class="form-control"
                                            placeholder="Rp. 0">
                                    </td>
                                    <td>
                                        <input type="number" name="dana_desa[realisasi]" class="form-control"
                                            placeholder="Rp. 0">
                                    </td>
                                    <td>
                                        <input type="number" name="dana_desa[lebih]" class="form-control"
                                            placeholder="Rp. 0">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Bagi Hasil Pajak & Retribusi</td>
                                    <td>
                                        <input type="number" name="bagi_hasil_pajak[rencana]" class="form-control"
                                            placeholder="Rp. 0">
                                    </td>
                                    <td>
                                        <input type="number" name="bagi_hasil_pajak[realisasi]" class="form-control"
                                            placeholder="Rp. 0">
                                    </td>
                                    <td>
                                        <input type="number" name="bagi_hasil_pajak[lebih]" class="form-control"
                                            placeholder="Rp. 0">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Alokasi Dana Desa</td>
                                    <td>
                                        <input type="number" name="alokasi_dana_desa[rencana]" class="form-control"
                                            placeholder="Rp. 0">
                                    </td>
                                    <td>
                                        <input type="number" name="alokasi_dana_desa[realisasi]" class="form-control"
                                            placeholder="Rp. 0">
                                    </td>
                                    <td>
                                        <input type="number" name="alokasi_dana_desa[lebih]" class="form-control"
                                            placeholder="Rp. 0">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Bantuan Keuangan Kabupaten</td>
                                    <td>
                                        <input type="number" name="bantuan_keuangan_kabupaten[rencana]"
                                            class="form-control" placeholder="Rp. 0">
                                    </td>
                                    <td>
                                        <input type="number" name="bantuan_keuangan_kabupaten[realisasi]"
                                            class="form-control" placeholder="Rp. 0">
                                    </td>
                                    <td>
                                        <input type="number" name="bantuan_keuangan_kabupaten[lebih]"
                                            class="form-control" placeholder="Rp. 0">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Bantuan Keuangan Provinsi</td>
                                    <td>
                                        <input type="number" name="bantuan_keuangan_provinsi[rencana]"
                                            class="form-control" placeholder="Rp. 0">
                                    </td>
                                    <td>
                                        <input type="number" name="bantuan_keuangan_provinsi[realisasi]"
                                            class="form-control" placeholder="Rp. 0">
                                    </td>
                                    <td>
                                        <input type="number" name="bantuan_keuangan_provinsi[lebih]"
                                            class="form-control" placeholder="Rp. 0">
                                    </td>
                                </tr>
                                <tr>
                                    <th colspan="4">PENDAPATAN LAIN-LAIN</th>
                                </tr>
                                <tr>
                                    <td>Hibah</td>
                                    <td>
                                        <input type="number" name="hibah[rencana]" class="form-control"
                                            placeholder="Rp. 0">
                                    </td>
                                    <td>
                                        <input type="number" name="hibah[realisasi]" class="form-control"
                                            placeholder="Rp. 0">
                                    </td>
                                    <td>
                                        <input type="number" name="hibah[lebih]" class="form-control"
                                            placeholder="Rp. 0">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Sumbangan Pihak ketiga</td>
                                    <td>
                                        <input type="number" name="sumbangan_pihak_ketiga[rencana]" class="form-control"
                                            placeholder="Rp. 0">
                                    </td>
                                    <td>
                                        <input type="number" name="sumbangan_pihak_ketiga[realisasi]"
                                            class="form-control" placeholder="Rp. 0">
                                    </td>
                                    <td>
                                        <input type="number" name="sumbangan_pihak_ketiga[lebih]" class="form-control"
                                            placeholder="Rp. 0">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Pendapatan Lain-lain</td>
                                    <td>
                                        <input type="number" name="pendapatan_lain[rencana]" class="form-control"
                                            placeholder="Rp. 0">
                                    </td>
                                    <td>
                                        <input type="number" name="pendapatan_lain[realisasi]" class="form-control"
                                            placeholder="Rp. 0">
                                    </td>
                                    <td>
                                        <input type="number" name="pendapatan_lain[lebih]" class="form-control"
                                            placeholder="Rp. 0">
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="card mt-3">
                        <div class="card-header">
                            <h6>2. Belanja Desa</h6>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <th></th>
                                    <th>Rencana / Anggaran</th>
                                    <th>Realisasi</th>
                                    <th>Lebih/Kurang</th>
                                </tr>

                                <tr>
                                    <td>PENYELENGGARAAN PEMERINTAHAN DESA</th>
                                    <td>
                                        <input type="number" name="penyelenggaraan_pemerintahan_desa[rencana]"
                                            class="form-control" placeholder="Rp. 0">
                                    </td>
                                    <td>
                                        <input type="number" name="penyelenggaraan_pemerintahan_desa[realisasi]"
                                            class="form-control" placeholder="Rp. 0">
                                    </td>
                                    <td>
                                        <input type="number" name="penyelenggaraan_pemerintahan_desa[lebih]"
                                            class="form-control" placeholder="Rp. 0">
                                    </td>
                                </tr>
                                <tr>
                                    <td>PELAKSANAAN PEMBANGUNAN DESA</th>
                                    <td>
                                        <input type="number" name="pelaksanaan_pembangunan_desa[rencana]"
                                            class="form-control" placeholder="Rp. 0">
                                    </td>
                                    <td>
                                        <input type="number" name="pelaksanaan_pembangunan_desa[realisasi]"
                                            class="form-control" placeholder="Rp. 0">
                                    </td>
                                    <td>
                                        <input type="number" name="pelaksanaan_pembangunan_desa[lebih]"
                                            class="form-control" placeholder="Rp. 0">
                                    </td>
                                </tr>
                                <tr>
                                    <td>PEMBINAAN KEMASYARAKATAN DESA</th>
                                    <td>
                                        <input type="number" name="pembinaan_kemasyarakatan_desa[rencana]"
                                            class="form-control" placeholder="Rp. 0">
                                    </td>
                                    <td>
                                        <input type="number" name="pembinaan_kemasyarakatan_desa[realisasi]"
                                            class="form-control" placeholder="Rp. 0">
                                    </td>
                                    <td>
                                        <input type="number" name="pembinaan_kemasyarakatan_desa[lebih]"
                                            class="form-control" placeholder="Rp. 0">
                                    </td>
                                </tr>
                                <tr>
                                    <td>PEMBERDAYAAN MASYARAKAT DESA</th>
                                    <td>
                                        <input type="number" name="pemberdayaan_masyarakat_desa[rencana]"
                                            class="form-control" placeholder="Rp. 0">
                                    </td>
                                    <td>
                                        <input type="number" name="pemberdayaan_masyarakat_desa[realisasi]"
                                            class="form-control" placeholder="Rp. 0">
                                    </td>
                                    <td>
                                        <input type="number" name="pemberdayaan_masyarakat_desa[lebih]"
                                            class="form-control" placeholder="Rp. 0">
                                    </td>
                                </tr>
                                <tr>
                                    <td>BELANJA TAK TERDUGA</th>
                                    <td>
                                        <input type="number" name="belanja_tidak_terduga[rencana]" class="form-control"
                                            placeholder="Rp. 0">
                                    </td>
                                    <td>
                                        <input type="number" name="belanja_tidak_terduga[realisasi]"
                                            class="form-control" placeholder="Rp. 0">
                                    </td>
                                    <td>
                                        <input type="number" name="belanja_tidak_terduga[lebih]" class="form-control"
                                            placeholder="Rp. 0">
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="card mt-3">
                        <div class="card-header">
                            <h6>3. Pembiayaan Desa</h6>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <th></th>
                                    <th>Rencana / Anggaran</th>
                                    <th>Realisasi</th>
                                    <th>Lebih/Kurang</th>
                                </tr>
                                <tr>
                                    <th colspan="4">PENERIMAAN PEMBIAYAAN</th>
                                </tr>
                                <tr>
                                    <td>SiLPA</th>
                                    <td>
                                        <input type="number" name="silpa[rencana]" class="form-control"
                                            placeholder="Rp. 0">
                                    </td>
                                    <td>
                                        <input type="number" name="silpa[realisasi]" class="form-control"
                                            placeholder="Rp. 0">
                                    </td>
                                    <td>
                                        <input type="number" name="silpa[lebih]" class="form-control"
                                            placeholder="Rp. 0">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Pencairan Dana Cadangan</td>
                                    <td>
                                        <input type="number" name="pencairan_dana_cadangan[rencana]"
                                            class="form-control" placeholder="Rp. 0">
                                    </td>
                                    <td>
                                        <input type="number" name="pencairan_dana_cadangan[realisasi]"
                                            class="form-control" placeholder="Rp. 0">
                                    </td>
                                    <td>
                                        <input type="number" name="pencairan_dana_cadangan[lebih]" class="form-control"
                                            placeholder="Rp. 0">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Hasil penjualan kekayaan Desa yang dipisahkan</td>
                                    <td>
                                        <input type="number" name="hasil_penjualan_kekayaan_desa[rencana]"
                                            class="form-control" placeholder="Rp. 0">
                                    </td>
                                    <td>
                                        <input type="number" name="hasil_penjualan_kekayaan_desa[realisasi]"
                                            class="form-control" placeholder="Rp. 0">
                                    </td>
                                    <td>
                                        <input type="number" name="hasil_penjualan_kekayaan_desa[lebih]"
                                            class="form-control" placeholder="Rp. 0">
                                    </td>
                                </tr>
                                <tr>
                                    <th colspan="4">PENGELUARAN PEMBIAYAAN</th>
                                </tr>
                                <tr>
                                    <td>Pembentukan Dana Cadangan</td>
                                    <td>
                                        <input type="number" name="pembentukan_dana_cadangan[rencana]"
                                            class="form-control" placeholder="Rp. 0">
                                    </td>
                                    <td>
                                        <input type="number" name="pembentukan_dana_cadangan[realisasi]"
                                            class="form-control" placeholder="Rp. 0">
                                    </td>
                                    <td>
                                        <input type="number" name="pembentukan_dana_cadangan[lebih]"
                                            class="form-control" placeholder="Rp. 0">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Penyertaan Modal Desa</td>
                                    <td>
                                        <input type="number" name="penyertaan_modal_desa[rencana]" class="form-control"
                                            placeholder="Rp. 0">
                                    </td>
                                    <td>
                                        <input type="number" name="penyertaan_modal_desa[realisasi]"
                                            class="form-control" placeholder="Rp. 0">
                                    </td>
                                    <td>
                                        <input type="number" name="penyertaan_modal_desa[lebih]" class="form-control"
                                            placeholder="Rp. 0">
                                    </td>
                                </tr>

                            </table>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary col-12 mt-4">Submit</button>
                </form>
            </div>
        </div>

    </div>
@endsection