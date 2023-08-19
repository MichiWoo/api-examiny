<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $user = User::where('id', 1)->first();
        
        Group::create([
            'name' => 'Español',
            'user_id' => $user->id,
        ]);
        
        Group::create([
            'name' => 'Matemáticas',
            'user_id' => $user->id,
        ]);
        
        Group::create([
            'name' => 'Geografía',
            'user_id' => $user->id,
        ]);

    }
}
