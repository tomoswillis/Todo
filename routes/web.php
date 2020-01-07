<?php

use Illuminate\Support\Facades\Route;

Route::get('/')
    ->uses('Tasks\TaskController@index')
    ->name('task.index');

Route::get('/tasks/delete/{task}')
    ->uses('Tasks\TaskController@destroy')
    ->name('task.destroy');

Route::get('/categories')
    ->uses('Categories\CategoryController@show')
    ->name('categories.show');

Route::get('/departments')
    ->uses('Departments\DepartmentController@show')
    ->name('departments.show');

Route::get('/users')
    ->uses('Users\UserController@show')
    ->name('user.show');
