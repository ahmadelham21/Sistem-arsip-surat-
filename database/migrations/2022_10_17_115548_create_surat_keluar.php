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
        Schema::create('tb_surat_keluar', function (Blueprint $table) {
            $table->id('id_suratkeluar');
            $table->dateTime('tanggalmasuk_suratkeluar');
            $table->string('kode_suratkeluar');
            $table->string('tipe');
            $table->string('nomor_suratkeluar');
            $table->date('tanggalsurat_suratkeluar');
            $table->string('pengirim');
            $table->string('kepada_suratkeluar');
            $table->text('perihal_suratkeluar');
            $table->string('file_suratkeluar');
            $table->string('operator');
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
        Schema::dropIfExists('tb_surat_keluar');
    }
};
