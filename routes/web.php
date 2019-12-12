<?php

use Illuminate\Support\Facades\Route;

Route::get('/')
    ->uses('Tasks\TaskController@index')
    ->name('task.index');
    
Route::post('/task/store')
    ->uses('Tasks\TaskController@store')
    ->name('task.store');

Route::get('/tasks/{task}')
    ->uses('Tasks\TaskController@show')
    ->name('task.show');

Route::get('/categories')
    ->uses('Categories\CategoryController@show')
    ->name('categories.show');
  
Route::get('/departments')
    ->uses('Departments\DepartmentController@show')
    ->name('departments.show');

Route::get('/users')
    ->uses('Users\UserController@show')
    ->name('user.show');
