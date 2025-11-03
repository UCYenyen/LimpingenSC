<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('services')->insert([
            'name' => 'Websites',
            'description' => 'An all-in-one solution for your online presence, combining professional web design with fast, reliable hosting and domain services.'
        ]);

        DB::table('services')->insert([
            'name' => 'Mobile Apps',
            'description' => 'Developing high-quality mobile applications using Android Studio or React Native, tailored to your specific needs.'
        ]);

        DB::table('services')->insert([
            'name' => 'Digital Marketing',
            'description' => 'Elevate your brand and expand your reach. We provide strategic promotion solutions designed to make your business known and drive tangible growth.'
        ]);

        DB::table('services')->insert([
            'name' => 'E-Commerce',
            'description' => 'Go digital and start selling to a global audience today. It is the most powerful way to grow your business.'
        ]);
    }
}
