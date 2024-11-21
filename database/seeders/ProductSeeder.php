<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Produk;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seeder untuk kategori Gaming
        Product::create([
            'customer_id' => 3, // ID dari listcategory "Gaming"
            'nama_produk' => 'Samsung Galaxy A24',
            'list_category_id' => '2',
            'category_id' => '2',
            'harga' => 5000000,
            'fee_penjualan' => 600000,
            'dana_diterima' => 4400000,
            'berat' => 1,
            'stok' => 1,
            'panjang' => 10,
            'lebar' => 15,
            'tinggi' => 1,
            'packing_kayu' => 0,
            'asuransi' => 0,
            'sisi_depan' => 'samsung.jpg',
            'sisi_kanan' => 'samsung.jpg',
            'sisi_atas' => 'samsung.jpg',
            'lainnya' => 'samsung.jpg',
            'kondisi_barang' => 'Brand New In Box',
            'garansi' => 'On',
            'lama_pemakaian' => '8 bulan',
            'tangan_ke' => '2',
            'waktu_pembelian' => '12 Agustus 2024',
            'minus' => 'No minus',
            'kelengkapan' => 'Charger',
            'wireless' => 'Wired',
            'suara_aman' => 'Aman'
        ]);
    }
}
