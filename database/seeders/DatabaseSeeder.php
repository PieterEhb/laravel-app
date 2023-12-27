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
        

        \App\Models\User::factory()->create([
            'name' => 'Test',
            'email' => 'pieter.de.pauw@student.ehb.be',
            'password' =>'Test1234',
            'is_admin' => 1
         ]);

         \App\Models\User::factory()->create([
            'name' => 'Test2',
            'email' => 'test2@student.ehb.be',
            'password' =>'Test1234'
         ]);
         
         \App\Models\news::factory(10)->create();
    }
}
