<?php

namespace App\Domain\Tasks;

use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    /**
     * Loads the Categories Page.
     *
     * @return \Illuminate\View\View
     */
    public function show($categoryId)
    {
        $model = [
            'tasks' => Task::where('category_id', $categoryId)->get(),
        ];

        return view('app/category/taskList')
            ->with('model', $model);
    }
}
