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
                    'Surat Pindah Penduduk',
                    'Surat Undangan',
                    'Surat Kematian',
                    'Surat Kelahiran',
                    'Surat Tugas',
                    'Surat Perjalanan Dinas'
                ]
            );
            $table->json('surat');
            $table->enum('status', ['Pending', 'Menunggu Persetujuan', 'Diproses', 'Selesai', 'Ditolak']);
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
