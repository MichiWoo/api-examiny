<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class GroupSeeder extends Seeder
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
            Group::create([
                'name' => $faker->jobTitle(),
                'user_id' => $randomUser->id
            ]);
        }
    }
}
