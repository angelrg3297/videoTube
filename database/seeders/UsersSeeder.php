<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'id' => 1, 
            'name' => 'Ángel',
            'surname' => 'Rodriguez',
            'email' => 'angel@videotube.com',
            'password' => Hash::make('123456'),
            'created_at' => now(),
        ]);
    }
}
