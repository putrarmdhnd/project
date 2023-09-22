<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apb_desas', function (Blueprint $table) {
            $table->id();
            $table->string('tahun');
            $table->string('judul');
            $table->string('gambar')->nullable();

            // Pendapatan Desa
            $table->json('hasil_usaha');
            $table->json('hasil_aset');
            $table->json('hasil_lain');
            $table->json('dana_desa');
            $table->json('bagi_hasil_pajak');
            $table->json('alokasi_dana_desa');
            $table->json('bantuan_keuangan_kabupaten');
            $table->json('bantuan_keuangan_provinsi');
            $table->json('hibah');
            $table->json('sumbangan_pihak_ketiga');
            $table->json('pendapatan_lain');

            // belanja desa
            $table->json('penyelenggaraan_pemerintahan_desa');
            $table->json('pelaksanaan_pembangunan_desa');
            $table->json('pembinaan_kemasyarakatan_desa');
            $table->json('pemberdayaan_masyarakat_desa');
            $table->json('belanja_tidak_terduga');

            // pembiayaan desa
            $table->json('silpa');
            $table->json('pencairan_dana_cadangan');
            $table->json('hasil_penjualan_kekayaan_desa');
            $table->json('pembentukan_dana_cadangan');
            $table->json('penyertaan_modal_desa');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apb_desas');
    }
};
