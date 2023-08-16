<?php

namespace Database\Seeders;

use App\Models\Test;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $users = User::all();

        for ($i=0; $i < 5; $i++) { 
            $randomUser = $users->random();
            Test::create([
                'name' => $faker->name(),
                'image' => $faker->imageUrl(200, 200, 'people'),
                'duration' => $faker->numberBetween(30, 90),
                'user_id' => $randomUser->id
            ]);
        }
    }
}
