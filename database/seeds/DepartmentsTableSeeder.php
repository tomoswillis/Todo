<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
            [
                'title' => 'Seeded department 1',
            ],
            [
                'title' => 'Seeded department 2',
            ]
        ]);
    }
}
