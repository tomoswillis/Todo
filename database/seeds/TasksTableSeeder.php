<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->insert([
            [
            'title' => 'seeded task',
            'category_id' => 1,
            'department_id' => 1,
            'user_id' => 1,
            'description' => 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum',
            'due_date' => now()->addWeek(),
            'progress' => 'Planning',
            ],
            [
            'title' => 'seeded task two',
            'category_id' => 1,
            'department_id' => 1,
            'user_id' => 2,
            'description' => 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum',
            'due_date' => now()->addWeek(),
            'progress' => 'Planning',
            ],
            [
            'title' => 'seeded task three',
            'category_id' => 1,
            'department_id' => 1,
            'user_id' => 1,
            'description' => 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum',
            'due_date' => now()->addWeek(),
            'progress' => 'Planning',
            ]
        ]);
    }
}
