<?php

namespace Database\Seeders;

use App\Models\Test;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        #   Obtener todos los examenes
        $tests = Test::all();

        foreach ($tests as $test) {
            #   Obtener los grupos de los exámenes
            $groups_of_test = $test->groups();

            #   Obtener los alumnos del grupo
            foreach ($groups_of_test as $group) {
                if ($group) {
                    $students_of_group = $group->students();
                    #   Crear el examen para cada alumno
                    foreach ($students_of_group as $student) {
                        $student->tests()->attach();
                    }
                }

            }
        }
    }
}
