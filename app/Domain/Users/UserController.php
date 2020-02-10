<?php

namespace App\Domain\Users;

use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Loads the Categories Page.
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        $model = [];
        
        $model['users'] = User::all()->toArray();

        return view('app/user/list')
            ->with('model', $model);
    }
}