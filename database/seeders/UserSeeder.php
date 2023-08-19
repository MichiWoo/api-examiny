<?php

namespace Database\Seeders;

use App\Models\Plan;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        

        $plans = Plan::all();
        $randomPlan = $plans->random();

        $user = User::create([
            'name' => 'Michel González Morales',
            'email' => 'michiwoo.web@gmail.com',
            'email_verified_at' => now(),
            'plan_id' => 1,
            'password' => Hash::make('secret'),
            'avatar' => $faker->imageUrl(200, 200, 'people')
        ]);
    }
}
