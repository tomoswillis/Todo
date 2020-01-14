<?php

use Illuminate\Support\Facades\Route;

Route::post('/task/edit/{task}')
    ->uses('Tasks\TaskController@update')
    ->name('task.update');

Route::post('/task/store')
    ->uses('Tasks\TaskController@store')
    ->name('task.store');

Route::get('/tasks/delete/{task}')
    ->uses('Tasks\TaskController@destroy')
    ->name('task.destroy');

Route::post('/department/store')
    ->uses('Departments\DepartmentController@store')
    ->name('Department.store');

Route::post('/category/store')
    ->uses('Categories\CategoryController@store')
    ->name('Category.show');
