<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PlanSeeder::class,
            UserSeeder::class,
            GroupSeeder::class,
            StudentSeeder::class,
            TestSeeder::class,
            QuestionSeeder::class,
            AnswerSeeder::class,
            StudentTestSeeder::class,
            #StudentAnswerSeeder::class,
        ]);
    }
}
