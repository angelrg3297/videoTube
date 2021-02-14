<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VideosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('videos')->insert([
            'user_id' => 1, // Angel
            'title' => 'Tutorial de Laravel',
            'description' => 'Video Tutorial de Laravel 8 en español',
            'status' => 1,
            'image' => '/asset/img/video_tutorial_laravel.jpg',
            'video_path' => '/asset/video/video_tutorial_laravel.mp4',
            'created_at' => now(),
        ]);
    }
}