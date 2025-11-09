<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Jeffrey',
            'email' => 'limpingensoftcomp@gmail.com',
            'password' => bcrypt('jeffrey123'),
            'phone_number' => '087722727717',
            'role' => 'admin'
        ]);

        DB::table('users')->insert([
            'name' => 'Obie',
            'email' => 'obiezuriel631@gmail.com',
            'password' => bcrypt('obie123'),
            'phone_number' => '082327701882',
            'role' => 'viewer'
        ]);

        DB::table('users')->insert([
            'name' => 'Bryan',
            'email' => 'bfernando@student.ciputra.ac.id',
            'password' => bcrypt('bryan123'),
            'phone_number' => '081231847161',
            'role' => 'admin'
        ]);
    }
}
