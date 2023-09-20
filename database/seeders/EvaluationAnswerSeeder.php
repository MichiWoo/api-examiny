<?php

namespace Database\Seeders;

use App\Models\Evaluation;
use App\Models\Group;
use App\Models\Student;
use App\Models\Test;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EvaluationAnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        #   Por cada Evaluación, encontrar los grupos y preguntas
        $evaluations = Evaluation::all();

        foreach ($evaluations as $evaluation) {
            $test_of_evaluation = $evaluation->test;
            $questions_of_test = $test_of_evaluation->questions;
    
            foreach ($questions_of_test as $question) {
                $answers_of_question = $question->answers;
                $randoAnswer = $answers_of_question->random();
                $randoAnswer->evaluation()->attach($evaluation);
            }
        }
    }
}
