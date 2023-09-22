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
                <form action="{{ route('cms.apb.update', $apb->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-header">
                            <h6>Edit APB Desa</h6>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="judul" class="form-label">Judul <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="judul" value="{{ old('judul', $apb->judul) }}"
                                        class="form-control" id="judul" placeholder="Masukkan judul">
                                </div>
                                <div class="col-md-4">
                                    <label for="tahun" class="form-label">Tahun <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="tahun" value="{{ old('tahun', $apb->tahun) }}"
                                        class="form-control" id="tahun" placeholder="Masukkan tahun">
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
                                        <input type="number" value="{{ json_decode($apb->hasil_usaha)->rencana }}"
                                            name="hasil_usaha[rencana]" class="form-control" placeholder="Rp. 0">
                                    </td>
                                    <td>
                                        <input type="number" value="{{ json_decode($apb->hasil_usaha)->realisasi }}"
                                            name="hasil_usaha[realisasi]" class="form-control" placeholder="Rp. 0">
                                    </td>
                                    <td>
                                        <input type="number" value="{{ json_decode($apb->hasil_usaha)->lebih }}"
                                            name="hasil_usaha[lebih]" class="form-control" placeholder="Rp. 0">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Hasil Aset</td>
                                    <td>
                                        <input type="number" value="{{ json_decode($apb->hasil_aset)->rencana }}"
                                            name="hasil_aset[rencana]" class="form-control" placeholder="Rp. 0">
                                    </td>
                                    <td>
                                        <input type="number" value="{{ json_decode($apb->hasil_aset)->realisasi }}"
                                            name="hasil_aset[realisasi]" class="form-control" placeholder="Rp. 0">
                                    </td>
                                    <td>
                                        <input type="number" value="{{ json_decode($apb->hasil_aset)->lebih }}"
                                            name="hasil_aset[lebih]" class="form-control" placeholder="Rp. 0">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Swadaya, Partisipasi, Gotong Royong</td>
                                    <td>
                                        <input type="number" value="{{ json_decode($apb->hasil_lain)->rencana }}"
                                            name="hasil_lain[rencana]" class="form-control" placeholder="Rp. 0">
                                    </td>
                                    <td>
                                        <input type="number" value="{{ json_decode($apb->hasil_lain)->realisasi }}"
                                            name="hasil_lain[realisasi]" class="form-control" placeholder="Rp. 0">
                                    </td>
                                    <td>
                                        <input type="number" value="{{ json_decode($apb->hasil_lain)->lebih }}"
                                            name="hasil_lain[lebih]" class="form-control" placeholder="Rp. 0">
                                    </td>
                                </tr>
                                <tr>
                                    <th colspan="4">PENDAPATAN TRANSFER</th>
                                </tr>
                                <tr>
                                    <td>Dana Desa</td>
                                    <td>
                                        <input type="number" value="{{ json_decode($apb->dana_desa)->rencana }}"
                                            name="dana_desa[rencana]" class="form-control" placeholder="Rp. 0">
                                    </td>
                                    <td>
                                        <input type="number" value="{{ json_decode($apb->dana_desa)->realisasi }}"
                                            name="dana_desa[realisasi]" class="form-control" placeholder="Rp. 0">
                                    </td>
                                    <td>
                                        <input type="number" value="{{ json_decode($apb->dana_desa)->lebih }}"
                                            name="dana_desa[lebih]" class="form-control" placeholder="Rp. 0">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Bagi Hasil Pajak & Retribusi</td>
                                    <td>
                                        <input type="number" value="{{ json_decode($apb->bagi_hasil_pajak)->rencana }}"
                                            name="bagi_hasil_pajak[rencana]" class="form-control" placeholder="Rp. 0">
                                    </td>
                                    <td>
                                        <input type="number"
                                            value="{{ json_decode($apb->bagi_hasil_pajak)->realisasi }}"
                                            name="bagi_hasil_pajak[realisasi]" class="form-control" placeholder="Rp. 0">
                                    </td>
                                    <td>
                                        <input type="number" value="{{ json_decode($apb->bagi_hasil_pajak)->lebih }}"
                                            name="bagi_hasil_pajak[lebih]" class="form-control" placeholder="Rp. 0">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Alokasi Dana Desa</td>
                                    <td>
                                        <input type="number" value="{{ json_decode($apb->alokasi_dana_desa)->rencana }}"
                                            name="alokasi_dana_desa[rencana]" class="form-control" placeholder="Rp. 0">
                                    </td>
                                    <td>
                                        <input type="number"
                                            value="{{ json_decode($apb->alokasi_dana_desa)->realisasi }}"
                                            name="alokasi_dana_desa[realisasi]" class="form-control" placeholder="Rp. 0">
                                    </td>
                                    <td>
                                        <input type="number" value="{{ json_decode($apb->alokasi_dana_desa)->lebih }}"
                                            name="alokasi_dana_desa[lebih]" class="form-control" placeholder="Rp. 0">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Bantuan Keuangan Kabupaten</td>
                                    <td>
                                        <input type="number"
                                            value="{{ json_decode($apb->bantuan_keuangan_kabupaten)->rencana }}"
                                            name="bantuan_keuangan_kabupaten[rencana]" class="form-control"
                                            placeholder="Rp. 0">
                                    </td>
                                    <td>
                                        <input type="number"
                                            value="{{ json_decode($apb->bantuan_keuangan_kabupaten)->realisasi }}"
                                            name="bantuan_keuangan_kabupaten[realisasi]" class="form-control"
                                            placeholder="Rp. 0">
                                    </td>
                                    <td>
                                        <input type="number"
                                            value="{{ json_decode($apb->bantuan_keuangan_kabupaten)->lebih }}"
                                            name="bantuan_keuangan_kabupaten[lebih]" class="form-control"
                                            placeholder="Rp. 0">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Bantuan Keuangan Provinsi</td>
                                    <td>
                                        <input type="number"
                                            value="{{ json_decode($apb->bantuan_keuangan_provinsi)->rencana }}"
                                            name="bantuan_keuangan_provinsi[rencana]" class="form-control"
                                            placeholder="Rp. 0">
                                    </td>
                                    <td>
                                        <input type="number"
                                            value="{{ json_decode($apb->bantuan_keuangan_provinsi)->realisasi }}"
                                            name="bantuan_keuangan_provinsi[realisasi]" class="form-control"
                                            placeholder="Rp. 0">
                                    </td>
                                    <td>
                                        <input type="number"
                                            value="{{ json_decode($apb->bantuan_keuangan_provinsi)->lebih }}"
                                            name="bantuan_keuangan_provinsi[lebih]" class="form-control"
                                            placeholder="Rp. 0">
                                    </td>
                                </tr>
                                <tr>
                                    <th colspan="4">PENDAPATAN LAIN-LAIN</th>
                                </tr>
                                <tr>
                                    <td>Hibah</td>
                                    <td>
                                        <input type="number" value="{{ json_decode($apb->hibah)->rencana }}"
                                            name="hibah[rencana]" class="form-control" placeholder="Rp. 0">
                                    </td>
                                    <td>
                                        <input type="number" value="{{ json_decode($apb->hibah)->realisasi }}"
                                            name="hibah[realisasi]" class="form-control" placeholder="Rp. 0">
                                    </td>
                                    <td>
                                        <input type="number" value="{{ json_decode($apb->hibah)->lebih }}"
                                            name="hibah[lebih]" class="form-control" placeholder="Rp. 0">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Sumbangan Pihak ketiga</td>
                                    <td>
                                        <input type="number"
                                            value="{{ json_decode($apb->sumbangan_pihak_ketiga)->rencana }}"
                                            name="sumbangan_pihak_ketiga[rencana]" class="form-control"
                                            placeholder="Rp. 0">
                                    </td>
                                    <td>
                                        <input type="number"
                                            value="{{ json_decode($apb->sumbangan_pihak_ketiga)->realisasi }}"
                                            name="sumbangan_pihak_ketiga[realisasi]" class="form-control"
                                            placeholder="Rp. 0">
                                    </td>
                                    <td>
                                        <input type="number"
                                            value="{{ json_decode($apb->sumbangan_pihak_ketiga)->lebih }}"
                                            name="sumbangan_pihak_ketiga[lebih]" class="form-control"
                                            placeholder="Rp. 0">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Pendapatan Lain-lain</td>
                                    <td>
                                        <input type="number" value="{{ json_decode($apb->pendapatan_lain)->rencana }}"
                                            name="pendapatan_lain[rencana]" class="form-control" placeholder="Rp. 0">
                                    </td>
                                    <td>
                                        <input type="number" value="{{ json_decode($apb->pendapatan_lain)->realisasi }}"
                                            name="pendapatan_lain[realisasi]" class="form-control" placeholder="Rp. 0">
                                    </td>
                                    <td>
                                        <input type="number" value="{{ json_decode($apb->pendapatan_lain)->lebih }}"
                                            name="pendapatan_lain[lebih]" class="form-control" placeholder="Rp. 0">
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
                                        <input type="number"
                                            value="{{ json_decode($apb->penyelenggaraan_pemerintahan_desa)->rencana }}"
                                            name="penyelenggaraan_pemerintahan_desa[rencana]" class="form-control"
                                            placeholder="Rp. 0">
                                    </td>
                                    <td>
                                        <input type="number"
                                            value="{{ json_decode($apb->penyelenggaraan_pemerintahan_desa)->realisasi }}"
                                            name="penyelenggaraan_pemerintahan_desa[realisasi]" class="form-control"
                                            placeholder="Rp. 0">
                                    </td>
                                    <td>
                                        <input type="number"
                                            value="{{ json_decode($apb->penyelenggaraan_pemerintahan_desa)->lebih }}"
                                            name="penyelenggaraan_pemerintahan_desa[lebih]" class="form-control"
                                            placeholder="Rp. 0">
                                    </td>
                                </tr>
                                <tr>
                                    <td>PELAKSANAAN PEMBANGUNAN DESA</th>
                                    <td>
                                        <input type="number"
                                            value="{{ json_decode($apb->pelaksanaan_pembangunan_desa)->rencana }}"
                                            name="pelaksanaan_pembangunan_desa[rencana]" class="form-control"
                                            placeholder="Rp. 0">
                                    </td>
                                    <td>
                                        <input type="number"
                                            value="{{ json_decode($apb->pelaksanaan_pembangunan_desa)->realisasi }}"
                                            name="pelaksanaan_pembangunan_desa[realisasi]" class="form-control"
                                            placeholder="Rp. 0">
                                    </td>
                                    <td>
                                        <input type="number"
                                            value="{{ json_decode($apb->pelaksanaan_pembangunan_desa)->lebih }}"
                                            name="pelaksanaan_pembangunan_desa[lebih]" class="form-control"
                                            placeholder="Rp. 0">
                                    </td>
                                </tr>
                                <tr>
                                    <td>PEMBINAAN KEMASYARAKATAN DESA</th>
                                    <td>
                                        <input type="number"
                                            value="{{ json_decode($apb->pembinaan_kemasyarakatan_desa)->rencana }}"
                                            name="pembinaan_kemasyarakatan_desa[rencana]" class="form-control"
                                            placeholder="Rp. 0">
                                    </td>
                                    <td>
                                        <input type="number"
                                            value="{{ json_decode($apb->pembinaan_kemasyarakatan_desa)->realisasi }}"
                                            name="pembinaan_kemasyarakatan_desa[realisasi]" class="form-control"
                                            placeholder="Rp. 0">
                                    </td>
                                    <td>
                                        <input type="number"
                                            value="{{ json_decode($apb->pembinaan_kemasyarakatan_desa)->lebih }}"
                                            name="pembinaan_kemasyarakatan_desa[lebih]" class="form-control"
                                            placeholder="Rp. 0">
                                    </td>
                                </tr>
                                <tr>
                                    <td>PEMBERDAYAAN MASYARAKAT DESA</th>
                                    <td>
                                        <input type="number"
                                            value="{{ json_decode($apb->pemberdayaan_masyarakat_desa)->rencana }}"
                                            name="pemberdayaan_masyarakat_desa[rencana]" class="form-control"
                                            placeholder="Rp. 0">
                                    </td>
                                    <td>
                                        <input type="number"
                                            value="{{ json_decode($apb->pemberdayaan_masyarakat_desa)->realisasi }}"
                                            name="pemberdayaan_masyarakat_desa[realisasi]" class="form-control"
                                            placeholder="Rp. 0">
                                    </td>
                                    <td>
                                        <input type="number"
                                            value="{{ json_decode($apb->pemberdayaan_masyarakat_desa)->lebih }}"
                                            name="pemberdayaan_masyarakat_desa[lebih]" class="form-control"
                                            placeholder="Rp. 0">
                                    </td>
                                </tr>
                                <tr>
                                    <td>BELANJA TAK TERDUGA</th>
                                    <td>
                                        <input type="number"
                                            value="{{ json_decode($apb->belanja_tidak_terduga)->rencana }}"
                                            name="belanja_tidak_terduga[rencana]" class="form-control"
                                            placeholder="Rp. 0">
                                    </td>
                                    <td>
                                        <input type="number"
                                            value="{{ json_decode($apb->belanja_tidak_terduga)->realisasi }}"
                                            name="belanja_tidak_terduga[realisasi]" class="form-control"
                                            placeholder="Rp. 0">
                                    </td>
                                    <td>
                                        <input type="number"
                                            value="{{ json_decode($apb->belanja_tidak_terduga)->lebih }}"
                                            name="belanja_tidak_terduga[lebih]" class="form-control" placeholder="Rp. 0">
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
                                        <input type="number" value="{{ json_decode($apb->silpa)->rencana }}"
                                            name="silpa[rencana]" class="form-control" placeholder="Rp. 0">
                                    </td>
                                    <td>
                                        <input type="number" value="{{ json_decode($apb->silpa)->realisasi }}"
                                            name="silpa[realisasi]" class="form-control" placeholder="Rp. 0">
                                    </td>
                                    <td>
                                        <input type="number" value="{{ json_decode($apb->silpa)->lebih }}"
                                            name="silpa[lebih]" class="form-control" placeholder="Rp. 0">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Pencairan Dana Cadangan</td>
                                    <td>
                                        <input type="number"
                                            value="{{ json_decode($apb->pencairan_dana_cadangan)->rencana }}"
                                            name="pencairan_dana_cadangan[rencana]" class="form-control"
                                            placeholder="Rp. 0">
                                    </td>
                                    <td>
                                        <input type="number"
                                            value="{{ json_decode($apb->pencairan_dana_cadangan)->realisasi }}"
                                            name="pencairan_dana_cadangan[realisasi]" class="form-control"
                                            placeholder="Rp. 0">
                                    </td>
                                    <td>
                                        <input type="number"
                                            value="{{ json_decode($apb->pencairan_dana_cadangan)->lebih }}"
                                            name="pencairan_dana_cadangan[lebih]" class="form-control"
                                            placeholder="Rp. 0">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Hasil penjualan kekayaan Desa yang dipisahkan</td>
                                    <td>
                                        <input type="number"
                                            value="{{ json_decode($apb->hasil_penjualan_kekayaan_desa)->rencana }}"
                                            name="hasil_penjualan_kekayaan_desa[rencana]" class="form-control"
                                            placeholder="Rp. 0">
                                    </td>
                                    <td>
                                        <input type="number"
                                            value="{{ json_decode($apb->hasil_penjualan_kekayaan_desa)->realisasi }}"
                                            name="hasil_penjualan_kekayaan_desa[realisasi]" class="form-control"
                                            placeholder="Rp. 0">
                                    </td>
                                    <td>
                                        <input type="number"
                                            value="{{ json_decode($apb->hasil_penjualan_kekayaan_desa)->lebih }}"
                                            name="hasil_penjualan_kekayaan_desa[lebih]" class="form-control"
                                            placeholder="Rp. 0">
                                    </td>
                                </tr>
                                <tr>
                                    <th colspan="4">PENGELUARAN PEMBIAYAAN</th>
                                </tr>
                                <tr>
                                    <td>Pembentukan Dana Cadangan</td>
                                    <td>
                                        <input type="number"
                                            value="{{ json_decode($apb->pembentukan_dana_cadangan)->rencana }}"
                                            name="pembentukan_dana_cadangan[rencana]" class="form-control"
                                            placeholder="Rp. 0">
                                    </td>
                                    <td>
                                        <input type="number"
                                            value="{{ json_decode($apb->pembentukan_dana_cadangan)->realisasi }}"
                                            name="pembentukan_dana_cadangan[realisasi]" class="form-control"
                                            placeholder="Rp. 0">
                                    </td>
                                    <td>
                                        <input type="number"
                                            value="{{ json_decode($apb->pembentukan_dana_cadangan)->lebih }}"
                                            name="pembentukan_dana_cadangan[lebih]" class="form-control"
                                            placeholder="Rp. 0">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Penyertaan Modal Desa</td>
                                    <td>
                                        <input type="number"
                                            value="{{ json_decode($apb->penyertaan_modal_desa)->rencana }}"
                                            name="penyertaan_modal_desa[rencana]" class="form-control"
                                            placeholder="Rp. 0">
                                    </td>
                                    <td>
                                        <input type="number"
                                            value="{{ json_decode($apb->penyertaan_modal_desa)->realisasi }}"
                                            name="penyertaan_modal_desa[realisasi]" class="form-control"
                                            placeholder="Rp. 0">
                                    </td>
                                    <td>
                                        <input type="number"
                                            value="{{ json_decode($apb->penyertaan_modal_desa)->lebih }}"
                                            name="penyertaan_modal_desa[lebih]" class="form-control" placeholder="Rp. 0">
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
