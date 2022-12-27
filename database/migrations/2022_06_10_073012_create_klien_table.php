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
        Schema::create('klien', function (Blueprint $table) {
            $table->id();
            $table->string('nama_klien', 45);
            $table->string('nama_perusahaan', 225);
            $table->string('nomor_hp', 45);
            $table->string('email', 225);
            $table->string('alamat', 225);
            
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
        Schema::dropIfExists('klien');
    }
};
