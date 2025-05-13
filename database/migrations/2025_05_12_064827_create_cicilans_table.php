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
        Schema::create('cicilan', function (Blueprint $table) {
            $table->id();
            $table->integer('produk_id')->nullable();
            $table->integer('dp')->nullable();
            $table->integer('tenor_12')->nullable();
            $table->integer('tenor_24')->nullable();
            $table->integer('tenor_36')->nullable();
            $table->integer('tenor_48')->nullable();
            $table->integer('tenor_60')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cicilan');
    }
};
