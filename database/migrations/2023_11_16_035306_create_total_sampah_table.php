<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTotalSampahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('total_sampah', function (Blueprint $table) {
            $table->id();
            $table->integer('id_jumlah_sampah')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->Integer('hasil');
            $table->Integer('penyimpangan');
            $table->string('status');

            // $table->foreign('id_jumlah_sampah')->references('id')->on('jumlah_sampah')->onDelete('cascade');
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('total_sampah');
    }
}
