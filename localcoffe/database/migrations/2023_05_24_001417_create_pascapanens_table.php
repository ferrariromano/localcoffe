<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePascapanensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pascapanens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('panen_id');
            $table->string('nama_produk');
            $table->date('tanggal_kemasan');
            $table->timestamps();
            $table->foreign('panen_id')->references('id')->on('panens')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pascapanens');
    }
}
