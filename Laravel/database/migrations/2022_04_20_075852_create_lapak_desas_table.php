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
        Schema::create('lapak_desas', function (Blueprint $table) {
            $table->id();
            $table->string('namaLapak');
            $table->string('gambar');
            $table->string('keterangan');
            $table->string('alamat');
            $table->integer('harga');
            $table->foreignId('categoryLapak_id');
            $table->string('pelapak');
            $table->integer('NoWA');
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
        Schema::dropIfExists('lapak_desas');
    }
};
