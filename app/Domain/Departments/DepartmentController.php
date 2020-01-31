<?php

namespace App\Domain\Departments;

use App\Http\Controllers\Controller;
use App\Domain\Departments\DepartmentMapper;

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

    public function store(DepartmentRequest $request)
    {
        $data = $request->input();

        $department = Department::create([
            'title' => $data['title'],
        ]);

        return [
            'status' => 'success',
            'department' => (new DepartmentMapper)->map($department),
        ];
    }

    public function destroy($department)
    {
        if (!Department::destroy($department)) {
            abort(500);
        }

        return;
    }
}
