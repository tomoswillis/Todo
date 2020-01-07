<?php

use Illuminate\Support\Facades\Route;

Route::post('/task/edit/{task}')
    ->uses('Tasks\TaskController@update')
    ->name('task.update');

Route::post('/task/store')
    ->uses('Tasks\TaskController@store')
    ->name('task.store');
