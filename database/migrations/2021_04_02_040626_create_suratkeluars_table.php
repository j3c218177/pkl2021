<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratkeluarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suratkeluars', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_keluar')->nullable();
            $table->text('nomor_dan_tanggal');
            $table->string('jenis_surat', 10);            
            $table->string('jawaban', 100);
            $table->string('ditujukan', 100);
            $table->string('hal', 100);
            $table->string('lampiran', 10);
            $table->string('bidang_dan_pj', 20);
            $table->string('pengetik', 20);
            $table->string('tindak_lanjut', 100);
            $table->string('arsip', 10);
            $table->string('note', 100);
            $table->string('kode_surat', 10);
            $table->foreignId('id_pengedit')->nullable()->constrained('users')->onDelete('set null')->onUpdate('cascade');
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
        Schema::dropIfExists('suratkeluars');
    }
}
