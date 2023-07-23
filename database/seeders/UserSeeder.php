<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Ivan',
                'email' => 'ivan.mandic@predavaci.algebra.hr',
                'password' => Hash::make('lozinka123'),
                'role_id' => 2
            ],            
            [
                'name' => 'Ana',
                'email' => 'ana@predavaci.algebra.hr',
                'password' => Hash::make('lozinka123'),
                'role_id' => 2
            ],
        ]);
    }
}