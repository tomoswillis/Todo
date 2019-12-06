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
            'title' => 'seededTest',
            'category_id' => 1,
            'due_date' => now()->addWeek(),
            'completed' => false, 
        ]);
    }
}
