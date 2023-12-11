<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Course;
use App\Models\Group;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = User::factory(100)->create();
        Course::factory(5)->create();
        $groups = Group::factory(20)->create();
        Lesson::factory(30)->create();
        foreach ($users as $user){
            $groupsIds = $groups->random(3)->pluck('id');
            $user->groups()->attach($groupsIds);
        }

//         \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
