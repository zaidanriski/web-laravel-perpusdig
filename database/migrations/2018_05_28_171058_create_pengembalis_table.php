<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengembalisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengembalis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nama')->index('pengembalis_nama')->nullable()->unsigned();
            $table->integer('NIM');
            $table->integer('judul')->index('pengembalis_judul')->nullable()->unsigned();
            $table->integer('ISBN');
            $table->date('tanggal_kembali');
            $table->integer('petugas')->index('pengembalis_petugas')->nullable()->unsigned();
            $table->timestamps();
        });

        Schema::table('pengembalis', function ($table) {
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
        Schema::table('pengembalis', function(Blueprint $table){
            $table->dropForeign('pengembalis_nama_foreign');
            $table->dropForeign('pengembalis_judul_foreign');
            $table->dropForeign('pengembalis_petugas_foreign');
        });
        Schema::dropIfExists('pengembalis');
    }
}
