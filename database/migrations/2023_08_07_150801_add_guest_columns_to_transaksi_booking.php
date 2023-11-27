<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGuestColumnsToTransaksiBooking extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transaksi_booking', function (Blueprint $table) {
            $table->integer('jumlah_dewasa')->default(0);
            $table->integer('jumlah_anak')->default(0);
            $table->integer('jumlah_balita')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transaksi_booking', function (Blueprint $table) {
            //
        });
    }
}
