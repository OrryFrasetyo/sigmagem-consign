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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade');
            $table->string('nama_produk');
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade'); // Foreign key
            $table->decimal('harga', 15, 2);
            $table->decimal('fee_penjualan', 10, 2)->nullable(); // 12% dari harga
            $table->decimal('dana_diterima', 10, 2)->nullable();// harga - fee_penjualan
            $table->integer('berat');
            $table->integer('stok');
            $table->integer('panjang');
            $table->integer('lebar');
            $table->integer('tinggi');
            $table->boolean('packing_kayu')->default(false);
            $table->boolean('asuransi')->default(false);
            $table->string('sisi_depan');
            $table->string('sisi_kanan');
            $table->string('sisi_atas');
            $table->string('lainnya');
            $table->string('kondisi_barang');
            $table->string('garansi');
            $table->string('lama_pemakaian')->nullable();
            $table->string('tangan_ke')->nullable();
            $table->string('waktu_pembelian')->nullable();
            $table->string('minus')->nullable();
            $table->string('kelengkapan')->nullable();
            $table->string('wireless')->nullable();
            $table->string('suara_aman')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
