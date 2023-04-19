<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Collection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class CollectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        Collection::factory(100)->state(new Sequence(
            fn (Sequence $sequence) => [
                'user_id' => $users->random()->id,
            ],
        ))
        ->create();
    }
}
