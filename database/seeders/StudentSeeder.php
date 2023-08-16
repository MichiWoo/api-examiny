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
        $faker = Faker::create();

        $users = User::all();

        for ($i=0; $i < 10; $i++) { 
            $randomUser = $users->random();
            Student::create([
                'name' => $faker->name(),
                'email' => $faker->unique()->safeEmail(),
                'user_id' => $randomUser->id
            ]);
        }

    }
}
