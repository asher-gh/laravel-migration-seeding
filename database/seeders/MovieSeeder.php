<?php

namespace Database\Seeders;

use App\Models\Director;
use App\Models\Movie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $directors = Director::all();

        /**
         * Generating director_id this way is much faster 
         * than using the factory.
         */
        Movie::factory(1000)->state(
            new Sequence(
                // TODO: if it breaks add Sequence $sequence
                fn () => [ 'director_id' => $directors->random()->id,
                ],
            )
        )->create();
        //
    }
}
