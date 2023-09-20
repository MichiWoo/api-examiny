<?php

namespace Database\Seeders;

use App\Models\Evaluation;
use App\Models\Group;
use App\Models\Test;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EvaluationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        #   Obtener todos los grupos

        $test1 = Test::where('id', 1)->first();
        $test2 = Test::where('id', 2)->first();
        $test3 = Test::where('id', 3)->first();
        $test4 = Test::where('id', 4)->first();
        $test5 = Test::where('id', 5)->first();


        $group_test1 = $test1->groups;
        $group_test2 = $test2->groups;
        $group_test3 = $test3->groups;
        $group_test4 = $test4->groups;
        $group_test5 = $test5->groups;
        
        foreach ($group_test1 as $grupo) {
            $students_grupo = $grupo->students;
            foreach ($students_grupo as $student) {
                Evaluation::create([
                    'student_id' => $student->id,
                    'test_id' => 1,
                ]);
            }
        }
        foreach ($group_test2 as $grupo) {
            $students_grupo = $grupo->students;
            foreach ($students_grupo as $student) {
                Evaluation::create([
                    'student_id' => $student->id,
                    'test_id' => 2,
                ]);
            }
        }
        foreach ($group_test3 as $grupo) {
            $students_grupo = $grupo->students;
            foreach ($students_grupo as $student) {
                Evaluation::create([
                    'student_id' => $student->id,
                    'test_id' => 3,
                ]);
            }
        }
        foreach ($group_test4 as $grupo) {
            $students_grupo = $grupo->students;
            foreach ($students_grupo as $student) {
                Evaluation::create([
                    'student_id' => $student->id,
                    'test_id' => 4,
                ]);
            }
        }
        foreach ($group_test5 as $grupo) {
            $students_grupo = $grupo->students;
            foreach ($students_grupo as $student) {
                Evaluation::create([
                    'student_id' => $student->id,
                    'test_id' => 5,
                ]);
            }
        }
    }
}
