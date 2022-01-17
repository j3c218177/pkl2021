<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkshopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workshops', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100);
            $table->string('nama_pelatihan', 100);
            $table->string('tempat', 100);
            $table->string('waktu', 100);
            $table->string('penyelenggara', 100);            
            $table->string('tahun', 100);
            $table->string('ln_dn', 100);
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
        Schema::dropIfExists('workshops');
    }
}
