<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 100,
            'username' => 'brad',
            'email' => 'brad@local',
            'password' => Hash::make('qwertyqwerty'),
            'isAdmin' => 1
        ]);

        DB::table('users')->insert([
            'id' => 200,
            'username' => 'barksalot',
            'email' => 'barksalot@local',
            'password' => Hash::make('qwertyqwerty')
        ]);

        DB::table('users')->insert([
            'id' => 300,
            'username' => 'meowsalot',
            'email' => 'meowsalot@local',
            'password' => Hash::make('qwertyqwerty')
        ]);

        DB::table('posts')->insert([
            'user_id' => 100,
            'title' => 'My First Post',
            'body' => 'Lorem ipsum this is my post.',
            'created_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('posts')->insert([
            'user_id' => 100,
            'title' => 'My Second Post: HTML',
            'body' => 'HTML stands for Hyper Text Markup Language',
            'created_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('posts')->insert([
            'user_id' => 200,
            'title' => 'Being a Dog Is Fun',
            'body' => 'I like to run and bark.',
            'created_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('follows')->insert([
            'user_id' => 200,
            'followeduser' => 100
        ]);

        DB::table('follows')->insert([
            'user_id' => 300,
            'followeduser' => 100
        ]);

        DB::table('follows')->insert([
            'user_id' => 300,
            'followeduser' => 200
        ]);
    }
}
