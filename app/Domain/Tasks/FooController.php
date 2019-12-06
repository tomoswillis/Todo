<?php

namespace App\Domain\Tasks;

use App\Http\Controllers\Controller;

class FooController extends Controller
{
    /**
     * Loads the Categories Page.
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        $model['foos'] = Foo::all()->toArray();

        return view('app/category/list-foo')
            ->with('model', $model);
    }
}
