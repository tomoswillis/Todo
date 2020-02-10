<?php

namespace App\Domain\Tasks;

use App\Domain\Departments\Department;
use App\Domain\Users\User;
use App\Domain\Categories\Category;

use EngageInteractive\LaravelViewModels\ViewModel;

class TaskViewModel extends ViewModel
{
    protected $order;

    public function __construct($order)
    {
        $this->order = $order;
    }

    public function tasks(): array
    {
        $tasks = Task::with('department', 'user', 'category')
            ->orderBy('due_date', $this->order)
            ->get()
            ->toArray();

        return (new TaskMapper)->all($tasks);
    }

    public function progress_flags(): array
    {
        return [
            'planning',
            'completed',
            'cancelled',
        ];
    }

    public function departments(): array
    {
        return Department::all()->toArray();
    }

    public function categories(): array
    {
        return Category::all()->toArray();
    }

    public function users(): array
    {
        return User::all()->toArray();
    }

    public function today(): array
    {
        $today = Task::with('department', 'user')
            ->where('due_date', now()->toDateString())
            ->get()
            ->toArray();

        return (new TaskMapper)->all($today);
    }
}
