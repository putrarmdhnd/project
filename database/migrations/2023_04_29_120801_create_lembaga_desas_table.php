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
        Schema::create('lembaga_desas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lembaga');
            $table->string('singkatan');
            $table->string('logo')->nullable();
            $table->string('alamat_kantor');
            $table->string('dasar_hukum')->nullable();
            $table->text('profil')->nullable();
            $table->text('visi_misi')->nullable();
            $table->text('tugas_fungsi')->nullable();
            $table->text('kepengurusan')->nullable();
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
        Schema::dropIfExists('lembaga_desas');
    }
};
