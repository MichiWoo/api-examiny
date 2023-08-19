<?php

namespace Database\Seeders;

use App\Models\Question;
use App\Models\Test;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        Question::create([
            'description' => '¿Qué es un diptongo?',
            'image' => $faker->imageUrl(640, 480),
            'type' => 1,
            'test_id' => 1
        ]);
        Question::create([
            'description' => '¿Qué es un triptongo?',
            'image' => $faker->imageUrl(640, 480),
            'type' => 1,
            'test_id' => 1
        ]);
        Question::create([
            'description' => '¿Qué es una sílaba?',
            'image' => $faker->imageUrl(640, 480),
            'type' => 1,
            'test_id' => 1
        ]);

        Question::create([
            'description' => '¿Qué es un verbo?',
            'image' => $faker->imageUrl(640, 480),
            'type' => 1,
            'test_id' => 2
        ]);
        Question::create([
            'description' => '¿Qué es un sinónimo?',
            'image' => $faker->imageUrl(640, 480),
            'type' => 1,
            'test_id' => 2
        ]);
        Question::create([
            'description' => '¿Qué es una antónimo?',
            'image' => $faker->imageUrl(640, 480),
            'type' => 1,
            'test_id' => 2
        ]);
        Question::create([
            'description' => '¿Qué es un entero?',
            'image' => $faker->imageUrl(640, 480),
            'type' => 1,
            'test_id' => 3
        ]);
        Question::create([
            'description' => '¿Qué es una fracción?',
            'image' => $faker->imageUrl(640, 480),
            'type' => 1,
            'test_id' => 3
        ]);
        Question::create([
            'description' => '¿Qué es un número primo?',
            'image' => $faker->imageUrl(640, 480),
            'type' => 1,
            'test_id' => 3
        ]);
        
    }
}
