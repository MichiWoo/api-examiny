<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = Student::all();
        $groups = Group::all();

        foreach ($groups as $group) {
            for ($i=0; $i < 5; $i++) { 
                $randomStudent = $students->random();
                $randomStudent->groups()->attach($group);
            }
        }
    }
}
