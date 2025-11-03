<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('projects')->insert([
            'name' => 'MySABDA',
            'description' => 'MySABDA is a dynamic Bible Study App that brings Scripture to life through rich hyperlinking — connecting verses to commentaries, cross-references, and even original Hebrew and Greek texts.',
            'image_url' => 'mysabda.svg',
            'user_id' => 1
        ]);

        DB::table('projects')->insert([
            'name' => 'Harapan Digital',
            'description' => 'Harapan Digital is a tech innovation supporting recovery for people with Mental Health Disorders (MHD), aiming to be a light and blessing for survivors and caregivers through digital resources, networks, and creative spaces. It features Telaga Counseling (1000+ audios), E-Learning devotionals, AI counselor, CBT-based tools, relaxation music, mood tracker, and more.',
            'image_url' => 'harapandigital.png',
            'user_id' => 1
        ]);

        DB::table('projects')->insert([
            'name' => 'C4OMI Indonesia',
            'description' => 'C4OMI Indonesia is an app that promotes mental well-being through videos, articles, e-books, music therapy, journaling, mood tracking, an AI counselor, and more — all adapted from NAMI resources for the Indonesian context.',
            'image_url' => 'C4OMI.png',
            'user_id' => 1
        ]);

        DB::table('projects')->insert([
            'name' => 'Konseling',
            'description' => 'Konseling is an app that help create a safe digital space for biblical counseling',
            'image_url' => 'konseling.png',
            'user_id' => 1
        ]);

        DB::table('projects')->insert([
            'name' => 'Ref21',
            'description' => 'Ref21 is an app that deliver Netflix and Spotify like streaming features tailored for STEMI’s ministry needs',
            'image_url' => 'ref21.png',
            'user_id' => 1
        ]);

        DB::table('projects')->insert([
            'name' => 'Dummy',
            'description' => 'Dumny is an app that deliver Netflix and Spotify like streaming features tailored for STEMI’s ministry needs',
            'image_url' => 'ref21.png',
            'user_id' => 1
        ]);
    }
}
