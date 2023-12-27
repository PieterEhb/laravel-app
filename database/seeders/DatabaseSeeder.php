<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test',
            'email' => 'pieter.de.pauw@student.ehb.be',
            'password' =>'Test1234'
         ]);

         \App\Models\userinfo::factory()->create([
            'user_id' => 1,
            'birthday' => '1993-07-30',
            'bio' =>'Hello World'
         ]);
    }
}
