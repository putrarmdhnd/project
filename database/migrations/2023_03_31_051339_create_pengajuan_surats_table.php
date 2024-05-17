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
        Schema::create('pengajuan_surats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('masyarakat_id')->unsigned();
            $table->foreign('masyarakat_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->text('pesan')->nullable();
            $table->enum(
                'jenis_surat',
                [
                    'Surat Keterangan',
                    'Surat Keterangan Domisili Haji', 
                    'Surat Keterangan Domisili Yayasan',
                    'Surat Keterangan Penguburan',
                    'Surat Keterangan Numpang Nikah',
                    'Surat Keterangan Duda Janda',
                    'Surat Keterangan Tentang Perkawinan',
                    'Surat Keterangan Belum Nikah',
                    'Surat Keterangan Pindah WNI',
                    'Surat Keterangan Pindah',
                    'Surat Keterangan Tidak Mampu',
                    'Surat Keterangan Usaha',
                    'Surat Keterangan Domisili',//belum ada akses kasi
                    'Surat Keterangan Beda Nama Data',
                    'Surat Keterangan Kehilangan',//belum ada akses kasi
                    'Surat Keterangan Orang Tua Wali',//belum ada akses kasi
                    'Surat Pengantar Pembuatan Kartu Keluarga',
                    'Surat Pengantar Keterangan Catatan Kepolisian',//belum ada akses kasi
                    'Surat Pernyataan Akad Nikah',//belum ada akses kasi
                    'Surat Pernyataan Ahli Waris',//belum ada akses kasi
                    'Surat Kematian',
                    'Surat Kelahiran'
                ]
            );
            $table->json('surat');
            $table->enum('status', ['Pending', 'verifikasi', 'Diproses', 'Selesai','beres', 'Ditolak']);
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
        Schema::dropIfExists('pengajuan_surats');
    }
};
