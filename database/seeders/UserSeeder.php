<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        
        $roleAdmin = Role::create(['name' => 'system']);
        $roleUser = Role::create(['name' => 'user']);
        $roleStudent = Role::create(['name' => 'student']);

        $permission1 = Permission::create(['name' => 'dashboard.index'])->syncRoles([$roleAdmin, $roleUser, $roleStudent]);

        $permission2_1 = Permission::create(['name' => 'users.index'])->assignRole($roleAdmin);
        $permission2_2 = Permission::create(['name' => 'users.edit'])->assignRole($roleAdmin);
        $permission2_3 = Permission::create(['name' => 'users.update'])->assignRole($roleAdmin);
        $permission2_4 = Permission::create(['name' => 'users.delete'])->assignRole($roleAdmin);

        $permission3_1 = Permission::create(['name' => 'students.index'])->syncRoles([$roleAdmin, $roleUser]);
        $permission3_2 = Permission::create(['name' => 'students.edit'])->syncRoles([$roleAdmin, $roleUser]);
        $permission3_3 = Permission::create(['name' => 'students.update'])->syncRoles([$roleAdmin, $roleUser]);
        $permission3_4 = Permission::create(['name' => 'students.delete'])->syncRoles([$roleAdmin, $roleUser]);
        
        $permission4_1 = Permission::create(['name' => 'groups.index'])->syncRoles([$roleAdmin, $roleUser, $roleStudent]);
        $permission4_2 = Permission::create(['name' => 'groups.edit'])->syncRoles([$roleAdmin, $roleUser]);
        $permission4_3 = Permission::create(['name' => 'groups.update'])->syncRoles([$roleAdmin, $roleUser]);
        $permission4_4 = Permission::create(['name' => 'groups.delete'])->syncRoles([$roleAdmin, $roleUser]);
        
        $permission5_1 = Permission::create(['name' => 'test.index'])->syncRoles([$roleAdmin, $roleUser, $roleStudent]);
        $permission5_2 = Permission::create(['name' => 'test.edit'])->syncRoles([$roleAdmin, $roleUser]);
        $permission5_3 = Permission::create(['name' => 'test.update'])->syncRoles([$roleAdmin, $roleUser]);
        $permission5_4 = Permission::create(['name' => 'test.delete'])->syncRoles([$roleAdmin, $roleUser]);

        $permission6_1 = Permission::create(['name' => 'questions.index'])->syncRoles([$roleAdmin, $roleUser, $roleStudent]);
        $permission6_2 = Permission::create(['name' => 'questions.edit'])->syncRoles([$roleAdmin, $roleUser]);
        $permission6_3 = Permission::create(['name' => 'questions.update'])->syncRoles([$roleAdmin, $roleUser]);
        $permission6_4 = Permission::create(['name' => 'questions.delete'])->syncRoles([$roleAdmin, $roleUser]);
        
        $permission7_1 = Permission::create(['name' => 'answers.index'])->syncRoles([$roleAdmin, $roleUser, $roleStudent]);
        $permission7_2 = Permission::create(['name' => 'answers.edit'])->syncRoles([$roleAdmin, $roleUser]);
        $permission7_3 = Permission::create(['name' => 'answers.update'])->syncRoles([$roleAdmin, $roleUser]);
        $permission7_4 = Permission::create(['name' => 'answers.delete'])->syncRoles([$roleAdmin, $roleUser]);

        

        $user1 = User::create([
            'name' => 'Michel González',
            'email' => 'michiwoo.web@gmail.com',
            'email_verified_at' => now(),
            'plan_id' => 1,
            'password' => null,
            'google_id' => '117326424736203972673',
            'avatar' => 'https://lh3.googleusercontent.com/a/ACg8ocKhxEiIpB8kM9Ov6itZvySkjvGD2uO_38bvXJL6LmN5OJE=s96-c'
        ]);
        
        $user2 = User::create([
            'name' => 'Mr. Juan',
            'email' => $faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'plan_id' => 1,
            'password' => Hash::make('secret'),
            'avatar' => $faker->imageUrl(200, 200, 'people')
        ]);
        
        $user3 = User::create([
            'name' => 'Yessica Vidal',
            'email' => $faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'plan_id' => 1,
            'password' => Hash::make('secret'),
            'avatar' => $faker->imageUrl(200, 200, 'people')
        ]);

        $user1->assignRole('system');
        $user2->assignRole('user');
        $user3->assignRole('student');
    }
}
