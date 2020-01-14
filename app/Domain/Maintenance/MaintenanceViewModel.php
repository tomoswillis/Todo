<?php

namespace App\Domain\Maintenance;

use App\Domain\Categories\Category;
use App\Domain\Departments\Department;
use App\Domain\Users\User;

use EngageInteractive\LaravelViewModels\ViewModel;

class MaintenanceViewModel extends ViewModel
{

    public function departments(): array
    {
        return Department::all()->toArray();
    }

    public function users(): array
    {
        return User::all()->toArray();
    }

    public function categories(): array
    {
        return Category::all()->toArray();
    }

}
