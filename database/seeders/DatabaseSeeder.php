<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
        ]);
        User::factory()->create([
            'name' => 'Riansyah Divano',
            'email' => 'vano@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('vano1234'),
            'remember_token' => Str::random(10)
        ]);

        //call other seeders
        $this->call([
            CustomerSeeder::class,
            ListCategorySeeder::class,
            CategorySeeder::class,
            // ProdukSeeder::class,
        ]);
    }


}
