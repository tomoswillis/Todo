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
            'id' => 1,
            'category_id' => 1,
            'title' => 'seededTask',
            'due_date' => now()->addWeek()->endOfWeek(),
            'completed' => false,
        ]);
    }
}
