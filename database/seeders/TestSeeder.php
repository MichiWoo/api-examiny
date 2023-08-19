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

        $user = User::where('id', 1)->first();

        Test::create([
            'name' => 'Español 1 - Unidad 1',
            'image' => $faker->imageUrl(200, 200, 'people'),
            'duration' => $faker->numberBetween(30, 90),
            'user_id' => $user->id
        ]);

        Test::create([
            'name' => 'Español 1 - Unidad 2',
            'image' => $faker->imageUrl(200, 200, 'people'),
            'duration' => $faker->numberBetween(30, 90),
            'user_id' => $user->id
        ]);

        Test::create([
            'name' => 'Matemáticas 1 - Unidad 1',
            'image' => $faker->imageUrl(200, 200, 'people'),
            'duration' => $faker->numberBetween(30, 90),
            'user_id' => $user->id
        ]);

        Test::create([
            'name' => 'Matemáticas 1 - Unidad 2',
            'image' => $faker->imageUrl(200, 200, 'people'),
            'duration' => $faker->numberBetween(30, 90),
            'user_id' => $user->id
        ]);

        Test::create([
            'name' => 'Geografía 1 - Unidad 1',
            'image' => $faker->imageUrl(200, 200, 'people'),
            'duration' => $faker->numberBetween(30, 90),
            'user_id' => $user->id
        ]);
        
    }
}
