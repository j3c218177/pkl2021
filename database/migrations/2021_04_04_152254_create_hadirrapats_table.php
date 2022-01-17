<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHadirrapatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hadirrapats', function (Blueprint $table) {
            $table->id();          
            $table->string('keterangan', 100);          
            $table->date('tanggal');          
            $table->string('pukul', 20);  
            $table->string('tempat', 100);          
            $table->string('yang_hadir', 100);
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
        Schema::dropIfExists('hadirrapats');
    }
}
