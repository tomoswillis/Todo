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
}