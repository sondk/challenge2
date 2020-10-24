<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DateTime;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\User::create([
            'username' => 'teacher',
            'password' => '$2y$10$AfePmHuMz7Ds3LjBi87WwOFsHyaZQzNYq5qFpSqJJR6JhOAwmveYK',
            'name' => 'TEACHER',
            'email' => 'teacher@gmail.com',
            'phone_number' => '0987654321',
            'is_teacher' => 1,
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);

        \App\Models\User::create([
            'username' => 'student1',
            'password' => '$2y$10$AfePmHuMz7Ds3LjBi87WwOFsHyaZQzNYq5qFpSqJJR6JhOAwmveYK',
            'name' => 'STUDENT1',
            'email' => 'student1@gmail.com',
            'phone_number' => '0987654322',
            'is_teacher' => 0,
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);

        \App\Models\Submission::create([
            'assignment_id' => 2,
            'student_id' => 2,
            'filename' => 'submitfile.txt',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);
    }
}
