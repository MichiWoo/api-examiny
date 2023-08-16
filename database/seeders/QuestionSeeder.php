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

        $tests = Test::all();

        for ($i=0; $i < 50; $i++) { 
            $randomTest = $tests->random();
            Question::create([
                'description' => $faker->text(70),
                'image' => $faker->imageUrl(640, 480),
                'type' => $faker->numberBetween(1, 2),
                'test_id' => $randomTest->id
            ]);
        }
    }
}
