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

    public function store(DepartmentRequest $request)
    {
        $data = $request->input();

        Department::create([
            'title' => $data['title'],
        ]);

        return [
            'status' => 'success',
            'redirect' => route('maintenance.show')
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
