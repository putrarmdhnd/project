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
            $table->string('tahun')->nullable();
            $table->decimal('anggaran', 40, 2)->nullable();
            $table->decimal('pengeluaran', 40, 2)->nullable();
            $table->string('judulPengeluaran')->nullable();
            $table->string('gambar')->nullable();
            $table->decimal('jumlah', 40, 2)->nullable();

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
