<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\Test;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tests = Test::all();
        $groups = Group::all();

        foreach ($groups as $group) {
            
            for ($i=0; $i < 3; $i++) { 
                $randomTest = $tests->random();
                $group->tests()->attach($randomTest);
            }
        }
    }
}
