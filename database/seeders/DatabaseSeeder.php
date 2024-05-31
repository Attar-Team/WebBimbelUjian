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
            'name' => 'Adza Zarif',
            'social_id'=> 'asd',
            'image'=> 'pootoo',
            'email' => 'adzazarf@gmail.com',
            'password'=> bcrypt('12345'),
            'no_telp'=> "085942972801",
        ]);
    }
}
