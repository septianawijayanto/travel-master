<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupirTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supir', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_jadwal')->references('id')->on('jadwal')->unsigned();
            $table->foreignId('user_id')->references('id')->on('users')->unsigned();
            $table->string('nama_supir')->nullable();
            $table->string('avatar');
            $table->text('alamat');
            $table->string('jenis_kelamin');
            $table->string('no_hp')->unique();
            $table->string('status');
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
        Schema::dropIfExists('supir');
    }
}
