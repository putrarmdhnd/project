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
            $table->id();
            $table->string('noKK');
            $table->string('namaLengkap');
            $table->string('NIK');
            $table->string('jk');
            $table->string('tempatLahir');
            $table->string('tanggalLahir');
            $table->string('agama');
            $table->string('pendidikan');
            $table->string('jenisPekerjaan');
            $table->string('goldar')->nullable();
            $table->string('statusPerkawinan');
            $table->string('tanggalPerkawinan')->nullable();
            $table->string('statusHubungan');
            $table->string('kewarganegaraan')->nullable();
            $table->string('noPaspor')->nullable();
            $table->string('noKitap')->nullable();
            $table->string('namaAyah');
            $table->string('namaIbu');
            $table->string('namaKepalaKeluarga');
            $table->string('alamat');
            $table->string('rt');
            $table->string('rw');
            $table->string('kodePos');
            $table->string('desa');
            $table->string('kecamatan');
            $table->string('kabupaten');
            $table->string('provinsi');
            $table->string('tanggalDikeluarkan');
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
