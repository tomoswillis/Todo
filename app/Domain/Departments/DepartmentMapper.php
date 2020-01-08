<?php

namespace App\Domain\Departments;

use EngageInteractive\LaravelViewModels\Mapper;

class DepartmentMapper extends Mapper
{
    public function map($data)
    {
        return [
                'id' => 2,
                'title' => 'working?',

        ];
    }
}
