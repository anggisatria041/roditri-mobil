<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pembayaran_cicilan', function (Blueprint $table) {
            $table->id();
            $table->integer('pemesanan_id')->nullable();
            $table->integer('total_bayar')->nullable();
            $table->integer('cicilan')->nullable();
            $table->string('bukti_pembayaran')->nullable();
            $table->date('tanggal_jatuh_tempo')->nullable();
            $table->date('tanggal_bayar')->nullable();
            $table->string('status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran_cicilan');
    }
};
