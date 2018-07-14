<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeminjamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjams', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nama')->index('peminjams_nama')->nullable()->unsigned();
            $table->integer('NIM');
            $table->integer('judul')->index('peminjams_judul')->nullable()->unsigned();
            $table->integer('ISBN');
            $table->date('tanggal_pinjam');
            $table->integer('petugas')->index('peminjams_petugas')->nullable()->unsigned();
            $table->timestamps();
        });

        Schema::table('peminjams', function ($table) {
            $table->foreign('nama')->references('id')->on('mahasiswas')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('judul')->references('id')->on('bukus')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('petugas')->references('id')->on('petugas')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('peminjams', function(Blueprint $table)
          {
           $table->dropForeign('peminjams_nama_foreign');
           $table->dropForeign('peminjams_judul_foreign');
           $table->dropForeign('peminjams_petugas_foreign');
          });

        Schema::dropIfExists('peminjams');
    }
}
