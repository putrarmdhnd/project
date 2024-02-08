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
        Schema::create('masyarakat_miskin', function (Blueprint $table) {
            $table->id();
            $table->string('NIK');
            $table->string('namaLengkap');
            $table->string('jk');
            $table->string('tempatLahir');
            $table->string('tanggalLahir');
            $table->string('agama');
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
            $table->rememberToken();
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
        Schema::dropIfExists('masyarakat_miskins');
    }
};
