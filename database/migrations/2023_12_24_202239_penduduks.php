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
        Schema::create('penduduks', function (Blueprint $table) {
            $table->id()->nullable();
            $table->string('noKK')->nullable();
            $table->string('namaLengkap')->nullable();
            $table->string('NIK')->nullable();
            $table->string('jk')->nullable();
            $table->string('tempatLahir')->nullable();
            $table->string('tanggalLahir')->nullable();
            $table->string('agama')->nullable();
            $table->string('pendidikan')->nullable();
            $table->string('jenisPekerjaan')->nullable();
            $table->string('goldar')->nullable();
            $table->string('statusPerkawinan')->nullable();
            $table->string('tanggalPerkawinan')->nullable();
            $table->string('statusHubungan')->nullable();
            $table->string('kewarganegaraan')->nullable();
            $table->string('noPaspor')->nullable();
            $table->string('noKitap')->nullable();
            $table->string('namaAyah')->nullable();
            $table->string('namaIbu')->nullable();
            $table->string('namaKepalaKeluarga')->nullable();
            $table->string('alamat')->nullable();
            $table->string('rt')->nullable();
            $table->string('rw')->nullable();
            $table->string('kodePos')->nullable();
            $table->string('desa')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kabupaten')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('tanggalDikeluarkan')->nullable();
            $table->string('tipePenduduk')->nullable();
            $table->string('statusNik')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('penduduks');
    }
};
