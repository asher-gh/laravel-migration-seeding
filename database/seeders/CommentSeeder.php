<?php

namespace Database\Seeders;

use App\Models\Director;
use App\Models\Movie;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        Movie::first()->comments()->create([
            'text' => fake()->text(),
            'user_id' => $users->random()->id 
        ]);

        Movie::first()->comments()->create([
            'text' => fake()->text(),
            'user_id' => $users->random()->id 
        ]);

        Director::first()->comments()->create([
            'text' => fake()->text(),
            'user_id' => $users->random()->id
        ]);
    }
}
