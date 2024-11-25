<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('wishlists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id'); // Relasi ke tabel customers
            $table->unsignedBigInteger('product_id'); // Relasi ke tabel products
            $table->timestamps();

            // Foreign key ke tabel customers
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');

            // Foreign key ke tabel products
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wishlists');
    }
};
