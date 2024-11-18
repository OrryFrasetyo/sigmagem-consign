<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data pertama
        Customer::factory()->create([
            'full_name' => 'Orry Frasetyo',
            'email' => 'orry@gmail.com',
            'no_hp' => '081234567890',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10)
        ]);

        // Data kedua
        Customer::factory()->create([
            'full_name' => 'Riansyah Divano',
            'email' => 'vano@mail.com',
            'no_hp' => '085259976677',
            'email_verified_at' => now(),
            'password' => Hash::make('vano1234'),
            'remember_token' => Str::random(10)
        ]);

        // Data acak
        Customer::factory(5)->create();
    }
}
