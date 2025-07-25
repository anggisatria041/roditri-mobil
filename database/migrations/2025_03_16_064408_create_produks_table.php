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
        Schema::create('produk', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('tahun');
            $table->integer('harga');
            $table->string('deskripsi');
            $table->string('warna');
            $table->integer('kapasitas_mesin');
            $table->string('bahan_bakar');
            $table->string('tipe');
            $table->integer('jumlah_muatan');
            $table->string('masa_berlaku_stnk');
            $table->integer('jarak_tempuh');
            $table->string('tour_id')->nullable();
            $table->string('foto1')->nullable(); // foto tambahan
            $table->string('foto2')->nullable();
            $table->string('foto3')->nullable();
            $table->string('foto4')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};
