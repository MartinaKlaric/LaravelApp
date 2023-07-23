<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('genres')->insert([
            [
                'name' => 'Triler',
                'created_at' => fake()->dateTime()
            ], 
            [
                'name' => 'Horor',
                'created_at' => fake()->dateTime()
            ], 
            [
                'name' => 'Komedija',
                'created_at' => fake()->dateTime()
            ]
        ]);
    }
}
