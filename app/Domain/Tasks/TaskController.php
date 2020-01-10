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
        $order = $request->input('order') ?? 'asc';

        $model = new TaskViewModel($order);

        return view('app/task/list')
            ->with($model->array());
    }

    // /**
    //  * shows one task
    //  *
    //  * @param \App\Domain\Tasks\Task $task
    //  * @return \Illuminate\View\View
    //  */
    // public function show()
    // {
    //     $model = [
    //         'task' => Task::all()->toArray(),
    //     ];

    //     return view('app/task/details')
    //         ->with('model', $model);
    // }


    public function store(TaskRequest $request)
    {
        $data = $request->input();

        Task::create([
            'title' => $data['task'],
            'description' => $data['description'],
            'due_date' => $data['due'],
            'category_id' => 1,
            'department_id' => $data['department'],
            'progress' => strtolower($data['progress']),

        ]);

        return [
            'status' => 'success',
            'redirect' => route('task.index')
        ];
    }

    public function destroy(Request $request, $task)
    {
        if(!Task::destroy($task)){
            abort(500);
        }

        return;
    }

    public function edit(Request $request, $task)
    {
        if(!$task = Task::find($task)){
            abort(500);
        }

        return view('app/task/edit')
            ->with('task', $task)
            ;
    }

    public function update(Request $request, int $task)
    {
        Task::where('id', $task)
            ->update([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                // 'progress' => $request->input('progress'),
                'department_id' => $request->input('department'),
                'due_date' => $request->input('due'),
            ]);

        return [
            'status' => 'success',
            // 'redirect' => route('task.index')
        ];
    }
}
