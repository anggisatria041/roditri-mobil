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
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('produk_id')->nullable();
            $table->string('jenis_pembayaran')->nullable();
            $table->string('bukti_pembayaran')->nullable();
            $table->string('status_pembayaran')->nullable();
            $table->integer('tenor')->nullable();
            $table->string('status_pemesanan')->nullable();
            $table->date('tanggal')->nullable();
            $table->string('ktp')->nullable();
            $table->string('slip_gaji')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanan');
    }
};
