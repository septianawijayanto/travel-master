<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMobilPemesananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mobil_pemesanan', function (Blueprint $table) {

            $table->foreignId('mobil_id');
            $table->foreignId('pemesanan_id');
            $table->primary(['mobil_id', 'pemesanan_id']);

            $table->foreign('mobil_id')->references('id')->on('mobil')->onDelete('cascade');
            $table->foreign('pemesanan_id')->references('id')->on('pemesanan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mobil_pemesanan');
    }
}
