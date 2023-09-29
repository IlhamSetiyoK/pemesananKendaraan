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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('nama_admin_peminjaman');
            $table->date('mulai_peminjaman');
            $table->date('selesai_peminjaman');
            $table->string('alasan_peminjaman', 255);
            $table->tinyInteger('status_peminjaman');
            // 0=>Waiting, 1=>Process, 2=>Finish 
            $table->unsignedBigInteger('id_kendaraan');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_driver');
            $table->timestamps();
            
            
            $table->foreign('id_kendaraan')->references('id')->on('cars');
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_driver')->references('id')->on('drivers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};
