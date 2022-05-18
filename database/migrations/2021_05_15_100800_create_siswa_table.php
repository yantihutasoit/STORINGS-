<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->string('s_nis')->unique();
            $table->string('s_nama');
            $table->string('s_nama_ortu');
            $table->string('s_tempat_lahir');
            $table->date('s_tgl_lahir');
            $table->string('s_alamat');
            $table->string('s_gender');
            $table->string('s_kelas');
            $table->string('s_semester');
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
        Schema::dropIfExists('siswa');
    }
}
