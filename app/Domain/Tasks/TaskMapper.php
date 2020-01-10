<?php

namespace App\Domain\Tasks;

use Carbon\Carbon;
use EngageInteractive\LaravelViewModels\Mapper;
use App\Domain\Departments\DepartmentMapper;

class TaskMapper extends Mapper
{
    public function map($data)
    {
        return [
            'id' => $data['id'],
            'category_id' => $data['category_id'],
            'department_id' => $data['department_id'],
            'title' => $data['title'],
            'description' => $data['description'],
            'due_date' => $data['due_date'],
            'progress' => $data['progress'],
            'day' => Carbon::parse($data['due_date'])->format('d'),
            'month' => Carbon::parse($data['due_date'])->format('F'),
            'due_today' => Carbon::parse($data['due_date'])->isToday(),
            'department' =>  (new DepartmentMapper)->map($data['department']),
        ];
    }
}
