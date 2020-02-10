<?php

namespace App\Domain\Categories;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

        $category = Category::create([
            'title' => $data['title'],
        ]);

        return [
            'status' => 'success',
            'category' => [
                'id' => $category->id,
                'title' => $category->title,
            ],
        ];
    }

    public function destroy($category)
    {
        if (!Category::destroy($category)) {
            abort(500);
        }

        return;
    }

    public function update(Request $request, int $category)
    {
        Category::where('id', $category)
            ->update([
                'title' => $request->input('title'),
            ]);

        $category = Category::find($category);

        return [
            'status' => 'success',
            'category' => [
                'id' => $category->id,
                'title' => $category->title,
            ],
        ];
    }
}
