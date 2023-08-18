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

        foreach ($students as $student) {
            $randomGroup = $groups->random();
            $randomGroup->students()->attach($student);
        }
    }
}
