<?php

namespace App\Domain\Departments;

use App\Http\Controllers\Controller;
use App\Domain\Departments\DepartmentMapper;
use Illuminate\Http\Request;

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

    public function update(Request $request, int $department)
    {
        Department::where('id', $department)
            ->update([
                'title' => $request->input('title'),
            ]);

        $department = Department::find($department);

        return [
            'status' => 'success',
            'department' => (new DepartmentMapper)->map($department),
        ];
    }
}
