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
        Schema::create('sewas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('car_id'); // Kolom ID mobil dari tabel cars
            $table->foreign('car_id')->references('id')->on('cars')->onDelete('cascade');
            $table->string('nik');
            $table->string('nama');
            $table->string('telp');
            $table->text('foto');
            $table->decimal('price', 10, 2);
            $table->date('sewa');
            $table->date('kembali');
            $table->decimal('total', 10, 2);
            $table->string('status_pembayaran')->default('Menunggu Pembayaran');
            $table->string('status_pengembalian')->default('Disewa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sewas');
    }
};
