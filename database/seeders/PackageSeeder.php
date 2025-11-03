<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('packages')->insert([
            'name' => 'Ministry',
            'description' => 'Template-based design, Hosting & domain, CMS, Photo gallery',
            'price' => '3.000.000',
            'service_id' => 1
        ]);

        DB::table('packages')->insert([
            'name' => 'Business',
            'description' => 'Up to 12 pages, Template editing design, Hosting & domain, CMS, Photo gallery, E-commerce',
            'price' => '4.500.000',
            'service_id' => 1
        ]);

        DB::table('packages')->insert([
            'name' => 'Business Pro',
            'description' => 'Up to 17 pages, Template editing design, Hosting & Domain, CMS, Photo gallery, E-Commerce, MultiLanguage, Many Plugins',
            'price' => '7.000.000',
            'service_id' => 1
        ]);
    }
}
