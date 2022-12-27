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
        Schema::create('salinan_akta', function (Blueprint $table) {
            $table->id();
            $table->string('file_salinan_akta')->nullable();
            $table->string('keterangan')->nullable();
            $table->unsignedBigInteger('dokumen_akta_id');
            $table->foreign('dokumen_akta_id')->references('id')->on('dokumen_akta');
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
        Schema::dropIfExists('salinan_akta');
    }
};
