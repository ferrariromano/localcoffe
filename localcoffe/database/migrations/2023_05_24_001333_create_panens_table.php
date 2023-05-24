<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePanensTable extends Migration
{

    public function up()
    {
        Schema::create('panens', function (Blueprint $table) {
            $table->id();
            $table->string('nama_tanaman');
            $table->date('tanggal_panen');
            $table->integer('jumlah_panen');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('panens');
    }
}
