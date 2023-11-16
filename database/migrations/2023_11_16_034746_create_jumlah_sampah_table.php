<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJumlahSampahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jumlah_sampah', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('jumlah');
            $table->string('sampah');
            $table->integer('jenis_sampah_id')->unsigned();
            $table->integer('user_id')->unsigned();
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
        Schema::dropIfExists('jumlah_sampah');
    }
}
