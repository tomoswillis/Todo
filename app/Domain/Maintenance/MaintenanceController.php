<?php

namespace App\Domain\Maintenance;

use App\Http\Controllers\Controller;

class MaintenanceController extends Controller
{
    /**
     * Loads the Task list Page.
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        $model = new MaintenanceViewModel();

        return view('app/maintenance/list')
            ->with($model->array());
    }
}
