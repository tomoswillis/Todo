<?php

namespace App\Domain\Departments;

use EngageInteractive\LaravelViewModels\Mapper;

class DepartmentMapper extends Mapper
{
    public function map($data)
    {
        return [
                'id' => $data['id'],
                'title' => $data['title'],

        ];
    }
}
