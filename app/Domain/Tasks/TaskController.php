<?php

namespace App\Domain\Tasks;

use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    /**
     * Loads the Task list Page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $model = [
            'tasks' => Task::with('department')
                ->get()
                ->toArray(),
        ];

        // dd($model['tasks']);

        return view('app/task/list')
            ->with('model', $model);
    }

    /**
     * shows one task
     *
     * @param \App\Domain\Tasks\Task $task
     * @return \Illuminate\View\View
     */
    public function show($task)
    {
        $model = [
            'task' => Task::find($task)->toArray(),
        ];

        return view('app/task/details')
            ->with('model', $model);
    }
}
