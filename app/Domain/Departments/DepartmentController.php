<?php

namespace App\Domain\Departments;

use App\Http\Controllers\Controller;

class DepartmentController extends Controller
{
    /**
     * Loads the Categories Page.
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        $model = [];
        
        $model['departments'] = Department::all()->toArray();

        return view('app/department/list')
            ->with('model', $model);
    }
}
