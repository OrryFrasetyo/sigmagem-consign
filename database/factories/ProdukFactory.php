<?php

namespace Database\Factories;

use App\Models\Produk;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produk>
 */
class ProdukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Produk::class;

    public function definition()
    {
        // Mendapatkan harga acak
        $harga = $this->faker->numberBetween(50000, 5000000);

        return [
            'nama_produk' => $this->faker->words(3, true), // Nama produk
            'category_id' => Category::factory(), // Relasi ke category
            'harga' => $harga, // Harga produk
            'fee_penjualan' => round(0.21 * $harga, 2), // 21% dari harga
            'dana_diterima' => round($harga - (0.21 * $harga), 2), // harga - fee
            'berat' => $this->faker->randomFloat(2, 0.1, 10), // Berat antara 0.1kg - 10kg
            'stok' => $this->faker->numberBetween(1, 100), // Stok produk
            'dimensi_barang' => json_encode([
                'panjang' => $this->faker->numberBetween(10, 100), // cm
                'lebar' => $this->faker->numberBetween(10, 100), // cm
                'tinggi' => $this->faker->numberBetween(10, 100), // cm
            ]),
            'gambar' => json_encode([
                $this->faker->imageUrl(640, 480, 'product', true, 'gambar1'),
                $this->faker->imageUrl(640, 480, 'product', true, 'gambar2'),
                $this->faker->imageUrl(640, 480, 'product', true, 'gambar3'),
                $this->faker->imageUrl(640, 480, 'product', true, 'gambar4'),
            ]),
            'kondisi_barang' => $this->faker->randomElement(['Baru', 'Bekas']), // Baru atau Bekas
            'garansi' => $this->faker->numberBetween(0, 24), // Garansi antara 0-24 bulan
            'deskripsi_produk' => $this->faker->paragraph(), // Deskripsi produk
        ];
    }
}
