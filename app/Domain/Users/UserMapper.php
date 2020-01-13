<?php

namespace App\Domain\Users;

use EngageInteractive\LaravelViewModels\Mapper;

class UserMapper extends Mapper
{
    public function map($data)
    {
        return [
                'id' => $data['id'],
                'title' => $data['name'],

        ];
    }
}
