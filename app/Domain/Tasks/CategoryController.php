<?php

namespace App\Domain\Tasks;

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
        $model['categories'] = Category::all()->toArray();

        return view('app/category/list')
            ->with('model', $model);
    }
}
