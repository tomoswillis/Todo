<?php

namespace App\Domain\Tasks;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Loads the Task list Page.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $order = 'desc';

        if ($request->input('order')) {
            $order = $request->input('order');
        }        

        $model = [
            'tasks' => Task::with('department')
                ->orderBy('due_date', $order)
                ->get()
                ->toArray(),
            'progress_flags' => [
                'planning',
                'completed',
                'cancelled',
            ],
        ];

        $foo = [
            'task' => Task::with('department')->find(1)->toArray(),
        ];

        return view('app/task/list')
            ->with('model', $model)
            ->with('foo', $foo);
    }

    /**
     * shows one task
     *
     * @param \App\Domain\Tasks\Task $task
     * @return \Illuminate\View\View
     */
    public function show()
    {
        $model = [
            'task' => Task::find()->toArray(),
        ];

        return view('app/task/details')
            ->with('model', $model);
    }


    public function store(TaskRequest $request)
    {
        $data = $request->input();

        Task::create([
            'title' => $data['task'],
            'description' => $data['description'],
            'due_date' => $data['due'],
            'category_id' => 1,
            'department_id' => 1,
            'progress' => strtolower($data['progress']),

        ]);
    }
}
