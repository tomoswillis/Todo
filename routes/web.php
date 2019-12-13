<?php

use Illuminate\Support\Facades\Route;

Route::get('/')
    ->uses('Tasks\TaskController@index')
    ->name('task.index');
    
Route::post('/task/store')
    ->uses('Tasks\TaskController@store')
    ->name('task.store');

// Route::get('/tasks/{task}')
//     ->uses('Tasks\TaskController@show')
//     ->name('task.show');

Route::put('/task/edit/{task}')
    ->uses('Tasks\TaskController@update')
    ->name('task.update');


Route::get('/tasks/edit/{task}')
    ->uses('Tasks\TaskController@edit')
    ->name('task.edit');

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
