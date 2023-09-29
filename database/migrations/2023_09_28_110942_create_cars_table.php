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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_kendaraan');
            $table->string('identitas_kendaraan');
            $table->tinyInteger('status_kendaraan');
            // 0->Available, 1->Maintenance
            $table->date('jadwal_service_kendaraan');
            $table->integer('sisa_bbm_kendaraan');
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
        Schema::dropIfExists('cars');
    }
};
