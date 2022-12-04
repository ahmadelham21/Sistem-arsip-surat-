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
        Schema::create('tb_surat_masuk', function (Blueprint $table) {
            $table->id('id_suratmasuk');
            $table->dateTime('tanggalmasuk_suratmasuk');
            $table->string('kode_suratmasuk');
            $table->string('tipe');
            $table->string('nomor_suratmasuk');
            $table->date('tanggalsurat_suratmasuk');
            $table->string('pengirim');
            $table->string('kepada_suratmasuk');
            $table->text('perihal_suratmasuk');
            $table->string('file_suratmasuk');
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
        Schema::dropIfExists('tb_surat_masuk');
    }
};
