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
        Schema::create('proyek_desas', function (Blueprint $table) {
            $table->id();
            $table->string('namaKegiatan');
            $table->string('lokasi');
            $table->string('slug');
            $table->integer('anggaran');
            $table->integer('volume');
            $table->string('sumberDana');
            $table->integer('tahun');
            $table->string('pelaksana');
            $table->text('manfaat');
            $table->text('keterangan');
            $table->string('gambar');
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
        Schema::dropIfExists('proyek_desas');
    }
};
