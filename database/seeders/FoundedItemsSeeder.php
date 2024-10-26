<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class FoundedItemsSeeder extends Seeder
{
    public function run()
    {
        // Insert 10 dummy data for founded_items table
        for ($i = 0; $i < 10; $i++) {
            DB::table('founded_items')->insert([
                'name' => Str::random(10),  // Dummy item name
                'photo' => 'https://www.hondacengkareng.com/wp-content/uploads/2020/05/KeyBlank-35121K1AN00.jpg',  // Dummy photo filename
                'found_date' => now()->subDays(rand(0, 30)),  // Random date within the last 30 days
                'location_option' => 'Location ' . rand(1, 5),  // Random location option
                'latitude' => rand(1, 90) + rand(0, 1000000) / 1000000,  // Random latitude
                'longitude' => rand(1, 180) + rand(0, 1000000) / 1000000,  // Random longitude
                'user_nim' => null,  // Dummy NIM (must exist in users table)
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
