<?php

namespace App\Domain\Categories;

use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Loads the Categories Page.
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        $model = [];

        $model['categories'] = Category::all()->toArray();

        return view('app/category/list')
            ->with('model', $model);
    }

    public function store(CategoryRequest $request)
    {
        $data = $request->input();

        Category::create([
            'title' => $data['title'],
        ]);

        return [
            'status' => 'success',
            'redirect' => route('maintenance.show')
        ];
    }

    public function destroy($category)
    {
        if (!Category::destroy($category)) {
            abort(500);
        }

        return;
    }
}
