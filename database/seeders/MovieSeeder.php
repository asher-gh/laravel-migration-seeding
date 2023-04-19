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

        // sequence method invokes the state method internally
        Movie::factory(200)->sequence(
            fn () => [ 'director_id' => $directors->random()->id ]
        )->create();
    }
}
