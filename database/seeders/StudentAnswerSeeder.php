<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentAnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        #   Por cada grupo, encontrar los examenes
        $groups = Group::all();

        foreach ($groups as $group) {
            $tests_of_group =  $group->tests();
            $students_of_group = $group->students();
            
            #   Por cada examen encontrar las preguntas
            foreach ($tests_of_groups as $test) {
                $questions_of_test = $test->questions();
                
                #   Por cada pregunta responder para cada student
                foreach ($questions_of_test as $question) {
                    $anwsers_of_question = $question->answers();

                    foreach ($students_of_group as $student) {
                        $randomAnswer = $anwsers_of_question->random();
                        $student->answers()->attach($randomAnswer);
                    }
                }
            }
        }

        $students = Student::all();

        foreach ($students as $student) {
            $groups_of_student = $student->groups()
        }
    }
}
