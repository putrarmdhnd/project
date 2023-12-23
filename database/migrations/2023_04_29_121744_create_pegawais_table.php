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
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('ttl');
            $table->string('status');
            $table->string('alamat');
            $table->foreignId('jabatan_pegawai_id')->nullable()->constrained('jabatan_pegawais')->cascadeOnUpdate()->nullOnDelete();
            $table->string('is_kepala_jabatan')->default(0);
            $table->text('pendidikan')->nullable();
            $table->string('foto')->nullable();
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
        Schema::dropIfExists('pegawais');
    }
};
