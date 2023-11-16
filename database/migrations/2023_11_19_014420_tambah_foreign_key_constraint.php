<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;

class TambahForeignKeyConstraint extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Foreign Key Manajemen Surat
        Schema::table('jumlah_sampah', function ($table) {
            $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('restrict')->onUpdate('restrict');
        });

        Schema::table('jumlah_sampah', function ($table) {
            $table->foreign('jenis_sampah_id')
            ->references('id')->on('jenis_sampah')
            ->onDelete('restrict')->onUpdate('restrict');
        });

        Schema::table('total_sampah', function ($table) {
            $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('restrict')->onUpdate('restrict');
        });

        Schema::table('total_sampah', function ($table) {
            $table->foreign('id_jumlah_sampah')
            ->references('id')->on('jumlah_sampah')
            ->onDelete('restrict')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
