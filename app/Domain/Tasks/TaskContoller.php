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
    public function show()
    {
        $test['tasks'] = task::all()->toArray();

        return view('app/category/taskList')
            ->with('test', $test);
    }
}
