<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemesananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->unsigned();
            $table->foreignId('id_jadwal')->references('id')->on('jadwal')->unsigned();
            $table->string('jumlah_penumpang');
            $table->text('alamat', 50);
            $table->string('jenis_kelamin', 15);
            $table->date('tanggal_pesan');
            $table->string('no_hp', 15);
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
        Schema::dropIfExists('pemesanan');
    }
}
