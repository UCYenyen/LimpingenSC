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
            'password' => 'jeffrey123',
            'phone_number' => '087722727717',
            'role' => 'admin'
        ]);

        DB::table('users')->insert([
            'name' => 'Obie',
            'email' => 'obiezuriel631@gmail.com',
            'password' => 'obie123',
            'phone_number' => '082327701882',
            'role' => 'viewer'
        ]);

        DB::table('users')->insert([
            'name' => 'Bryan',
            'email' => 'bryanfernandodinata@gmail.com',
            'password' => 'bryan123',
            'phone_number' => '081231847161',
            'role' => 'viewer'
        ]);
    }
}
