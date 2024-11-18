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
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->string('nama_produk');
            //tambahkan list kategori
            $table->unsignedBigInteger('category_id');
            $table->decimal('harga', 15, 2);
            $table->decimal('fee_penjualan', 15, 2)->nullable(); // 21% dari harga
            $table->decimal('dana_diterima', 15, 2)->nullable(); // harga - fee_penjualan
            $table->decimal('berat', 8, 2);
            $table->integer('stok');
            $table->json('dimensi_barang');
            $table->boolean('packing_kayu');
            $table->boolean('asuransi');
            // Panjang, lebar, tinggi dalam format JSON
            $table->json('gambar'); // Array JSON untuk 4 gambar
            $table->string('kondisi_barang');
            $table->string('garansi')->default(false);
            $table->string('lama_pemakaian');
            $table->integer('tangan_ke');
            $table->string('waktu_pembelian');
            $table->string('minus');
            $table->string('kelengkapan');
            $table->string('wireless');
            $table->string('suara_aman');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
