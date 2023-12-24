<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        Schema::create('kematians', function (Blueprint $table) {
            $table->id();
            $table->string('NIK');
            $table->string('namaLengkap');
            $table->string('ttl');
            $table->string('ttm');
            $table->string('namaPelapor');
            $table->string('nikPelapor');
            $table->string('noDapatDihubungi');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kematians');
    }
};
