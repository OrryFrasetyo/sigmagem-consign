<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seeder untuk kategori Gaming
        Category::create([
            'list_category_id' => 1, // ID dari listcategory "Gaming"
            'nama_kategori' => 'Mouse',
            'gambar' => 'category_images/mouse.png',
        ]);

        Category::create([
            'list_category_id' => 1,
            'nama_kategori' => 'Keyboard',
            'gambar' => 'category_images/keyboard.png',
        ]);

        Category::create([
            'list_category_id' => 1,
            'nama_kategori' => 'Headphone',
            'gambar' => 'category_images/headphone.png',
        ]);

        // Seeder untuk kategori Gadget
        Category::create([
            'list_category_id' => 2, // ID dari listcategory "Gadget"
            'nama_kategori' => 'Handphone',
            'gambar' => 'category_images/handphone.png',
        ]);

        Category::create([
            'list_category_id' => 2,
            'nama_kategori' => 'Camera',
            'gambar' => 'category_images/camera.png',
        ]);
    }
}
