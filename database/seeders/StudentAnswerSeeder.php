<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\Student;
use App\Models\Test;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentAnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        #   Por cada examen, encontrar los grupos y preguntas
        $tests = Test::all();
        foreach ($tests as $test) {
            $groups_of_test = $test->groups;
            $quesions_of_test = $test->questions;
    
            #   Por cada grupo encontrar usuarios
            foreach ($groups_of_test as $group) {
                
                $students_of_group = $group->students;
                
                #   Por cada usuario contestar todas las preguntas del usuario
                foreach ($students_of_group as $student) {
                    foreach ($quesions_of_test as $question) {
                        #   Obtener las respuestas de la pregunta y escoger una para el usuario
                        $answers_of_question = $question->answers;
                        $randoAnswer = $answers_of_question->random();

                        $student->answers()->attach($randoAnswer);
                    }    
                }
            }
        }
    }
}
