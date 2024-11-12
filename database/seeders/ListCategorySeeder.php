<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ListCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('list_categories')->insert([
            ['list_kategori' => 'Gaming'],
            ['list_kategori' => 'Gadget'],
            ['list_kategori' => 'PC & Laptop'],
            ['list_kategori' => 'Toys'],
            ['list_kategori' => 'Lainnya'],
        ]);
    }
}
