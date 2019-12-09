<?php

// Route::get('/')
//     ->uses('Home\HomeController')
//     ->name('home.show');

Route::get('/')
    ->uses('Tasks\TaskController@index')
    ->name('task.index');

Route::get('/tasks/{task}')
    ->uses('Tasks\TaskController@show')
    ->name('task.show');

Route::get('/categories')
    ->uses('Tasks\CategoryController@show')
    ->name('categories.show');
  
Route::get('/departments')
    ->uses('Tasks\DepartmentController@show')
    ->name('departments.show');
