<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $plan1 = Plan::create([
            'description' => 'Freemiun'
        ]);

        $plan2 = Plan::create([
            'description' => 'Premiun'
        ]);
    }
}
