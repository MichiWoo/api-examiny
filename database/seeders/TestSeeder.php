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

        $test1 = Test::create([
            'name' => 'Español 1 - Unidad 1',
            'image' => $faker->imageUrl(200, 200, 'people'),
            'duration' => $faker->numberBetween(30, 90),
            'user_id' => $user->id
        ]);

        $test2 = Test::create([
            'name' => 'Español 1 - Unidad 2',
            'image' => $faker->imageUrl(200, 200, 'people'),
            'duration' => $faker->numberBetween(30, 90),
            'user_id' => $user->id
        ]);

        $test3 = Test::create([
            'name' => 'Matemáticas 1 - Unidad 1',
            'image' => $faker->imageUrl(200, 200, 'people'),
            'duration' => $faker->numberBetween(30, 90),
            'user_id' => $user->id
        ]);

        $test4 = Test::create([
            'name' => 'Matemáticas 1 - Unidad 2',
            'image' => $faker->imageUrl(200, 200, 'people'),
            'duration' => $faker->numberBetween(30, 90),
            'user_id' => $user->id
        ]);

        $test5 = Test::create([
            'name' => 'Geografía 1 - Unidad 1',
            'image' => $faker->imageUrl(200, 200, 'people'),
            'duration' => $faker->numberBetween(30, 90),
            'user_id' => $user->id
        ]);
        
        $test1->groups()->attach(1);
        $test2->groups()->attach(1);
        $test3->groups()->attach(2);
        $test4->groups()->attach(2);
        $test5->groups()->attach(3);
    }
}
