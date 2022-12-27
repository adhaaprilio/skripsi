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
        Schema::create('dokumen_akta', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_akta');
            $table->string('judul_akta');
            $table->string('jenis_akta');
            $table->date('tanggal_mulai');
            $table->date('tanggal_tandatangan')->nullable();
            $table->date('tanggal_selesai')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('klien_id');
            $table->foreign('klien_id')->references('id')->on('klien');
            $table->unsignedBigInteger('status_id');
            $table->foreign('status_id')->references('id')->on('status');
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
        Schema::dropIfExists('dokumen_akta');
    }
};
