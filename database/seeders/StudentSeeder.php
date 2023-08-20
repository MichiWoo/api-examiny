<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('id', 1)->first();
        
        $faker = Faker::create();

        $student1 = Student::create([
            'name' => $faker->name(),
            'email' => $faker->unique()->safeEmail(),
            'user_id' => $user->id
        ]);

        $student2 = Student::create([
            'name' => $faker->name(),
            'email' => $faker->unique()->safeEmail(),
            'user_id' => $user->id
        ]);

        $student3 = Student::create([
            'name' => $faker->name(),
            'email' => $faker->unique()->safeEmail(),
            'user_id' => $user->id
        ]);

        $student1->groups()->attach([1,2]);
        $student2->groups()->attach([1,3]);
        $student3->groups()->attach([3]);

    }
}
