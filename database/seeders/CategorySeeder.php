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
            'nama_kategori' => 'Console',
            'gambar' => 'console.jpg',
        ]);

        Category::create([
            'list_category_id' => 1, // ID dari listcategory "Gaming"
            'nama_kategori' => 'Controller',
            'gambar' => 'controller.jpg',
        ]);

        Category::create([
            'list_category_id' => 1, // ID dari listcategory "Gaming"
            'nama_kategori' => 'Keyboard',
            'gambar' => 'keyboard.jpg',
        ]);

        Category::create([
            'list_category_id' => 1, // ID dari listcategory "Gaming"
            'nama_kategori' => 'Mouse',
            'gambar' => 'mouse.jpg',
        ]);

        Category::create([
            'list_category_id' => 1, // ID dari listcategory "Gaming"
            'nama_kategori' => 'Mousepad',
            'gambar' => 'mousepad.jpg',
        ]);

        Category::create([
            'list_category_id' => 1, // ID dari listcategory "Gaming"
            'nama_kategori' => 'Storage',
            'gambar' => 'storage.jpg',
        ]);

        Category::create([
            'list_category_id' => 1, // ID dari listcategory "Gaming"
            'nama_kategori' => 'Headphone',
            'gambar' => 'headphone.jpg',
        ]);

        Category::create([
            'list_category_id' => 1, // ID dari listcategory "Gaming"
            'nama_kategori' => 'Video Games',
            'gambar' => 'videogames.jpg',
        ]);



        // Seeder untuk kategori Gadget
        Category::create([
            'list_category_id' => 2,
            'nama_kategori' => 'Camera',
            'gambar' => 'camera.jpg',
        ]);

        Category::create([
            'list_category_id' => 2,
            'nama_kategori' => 'Drone',
            'gambar' => 'drone.jpg',
        ]);

        Category::create([
            'list_category_id' => 2,
            'nama_kategori' => 'Headset',
            'gambar' => 'headset.jpg',
        ]);

        Category::create([
            'list_category_id' => 2,
            'nama_kategori' => 'Microphone',
            'gambar' => 'microphone.jpg',
        ]);

        Category::create([
            'list_category_id' => 2,
            'nama_kategori' => 'Phone',
            'gambar' => 'phone.jpg',
        ]);

        Category::create([
            'list_category_id' => 2,
            'nama_kategori' => 'Smartwatch',
            'gambar' => 'smartwatch.jpg',
        ]);

        Category::create([
            'list_category_id' => 2,
            'nama_kategori' => 'Speaker',
            'gambar' => 'speaker.jpg',
        ]);

        Category::create([
            'list_category_id' => 2,
            'nama_kategori' => 'Modem / Router',
            'gambar' => 'modem.jpg',
        ]);

        Category::create([
            'list_category_id' => 2,
            'nama_kategori' => 'CCTV',
            'gambar' => 'cctv.jpg',
        ]);

        Category::create([
            'list_category_id' => 2,
            'nama_kategori' => 'Accessories',
            'gambar' => 'accgadget.jpg',
        ]);

        Category::create([
            'list_category_id' => 2,
            'nama_kategori' => 'Tablet',
            'gambar' => 'tablet.jpg',
        ]);


        // Seeder untuk kategori PC & Laptop
        Category::create([
            'list_category_id' => 3,
            'nama_kategori' => 'PC',
            'gambar' => 'pc.jpg',
        ]);

        Category::create([
            'list_category_id' => 3,
            'nama_kategori' => 'Laptop',
            'gambar' => 'laptop.jpg',
        ]);

        Category::create([
            'list_category_id' => 3,
            'nama_kategori' => 'HDD / SSD',
            'gambar' => 'hddssd.jpg',
        ]);

        Category::create([
            'list_category_id' => 3,
            'nama_kategori' => 'Monitor',
            'gambar' => 'monitor.jpg',
        ]);

        Category::create([
            'list_category_id' => 3,
            'nama_kategori' => 'Motherboard',
            'gambar' => 'motherboard.jpg',
        ]);

        Category::create([
            'list_category_id' => 3,
            'nama_kategori' => 'Processor',
            'gambar' => 'processor.jpg',
        ]);

        Category::create([
            'list_category_id' => 3,
            'nama_kategori' => 'RAM',
            'gambar' => 'ram.jpg',
        ]);

        Category::create([
            'list_category_id' => 3,
            'nama_kategori' => 'PSU (Power Supply Unit)',
            'gambar' => 'psu.jpg',
        ]);

        Category::create([
            'list_category_id' => 3,
            'nama_kategori' => 'VGA',
            'gambar' => 'vga.jpg',
        ]);

        Category::create([
            'list_category_id' => 3,
            'nama_kategori' => 'PC Case',
            'gambar' => 'pccase.jpg',
        ]);

        Category::create([
            'list_category_id' => 3,
            'nama_kategori' => 'Fan',
            'gambar' => 'fan.jpg',
        ]);

        Category::create([
            'list_category_id' => 3,
            'nama_kategori' => 'Accesories ',
            'gambar' => 'pcacc.jpg',
        ]);

        Category::create([
            'list_category_id' => 3,
            'nama_kategori' => 'Webcam',
            'gambar' => 'webcam.jpg',
        ]);


        // Seeder untuk kategori PC & Laptop
        Category::create([
            'list_category_id' => 4,
            'nama_kategori' => 'Action Figures',
            'gambar' => 'actionfigures.jpg',
        ]);
        Category::create([
            'list_category_id' => 4,
            'nama_kategori' => 'Board Games',
            'gambar' => 'boardgames.jpg',
        ]);


        // Seeder untuk kategori PC & Laptop
        Category::create([
            'list_category_id' => 5,
            'nama_kategori' => 'Uncategorized',
            'gambar' => 'uncategorized.png',
        ]);




    }
}
