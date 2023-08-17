<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $questions = Question::all();

        foreach ($questions as $q) {
            for ($i=0; $i < 4; $i++) { 
                Answer::create([
                    'description' => $faker->text(70),
                    'image' => $faker->imageUrl(640, 480),
                    'correct' => $faker->numberBetween(0,1),
                    'question_id' => $q->id
                ]);
            }
        }
    }
}
