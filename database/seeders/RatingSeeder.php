<?php

namespace Database\Seeders;

use App\Models\Movie;
use App\Models\Rating;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $movies = Movie::all();

        Rating::factory(100)->state(new Sequence(
            fn (Sequence $sequence) => [
                'user_id' => $users->random()->id,
                'movie_id' => $movies->random()->id
            ],
        ))
        ->create();
    }
}
