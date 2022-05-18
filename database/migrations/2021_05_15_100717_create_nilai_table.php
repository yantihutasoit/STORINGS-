<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai', function (Blueprint $table) {
            $table->id();
            $table->string('n_nama');
            $table->string('n_nama_ortu');
            $table->string('n_nis')->unique();
            $table->integer('n_agama');
            $table->integer('n_pkn');
            $table->integer('n_bindo');
            $table->integer('n_bing');
            $table->integer('n_ipa');
            $table->integer('n_ips');
            $table->integer('n_mtk');
            $table->integer('n_sbk');
            $table->integer('n_penjas');
            $table->integer('kkm');
            $table->unsignedBigInteger("id_users");
            $table->foreign('id_users')->references('id')->on('users');
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
        Schema::dropIfExists('nilai');
    }
}
