<?php

use Illuminate\Support\Facades\Route;

Route::get('/')
    ->uses('Tasks\TaskController@index')
    ->name('task.index');

Route::get('/categories')
    ->uses('Categories\CategoryController@show')
    ->name('categories.show');

Route::get('/departments')
    ->uses('Departments\DepartmentController@show')
    ->name('departments.show');

Route::get('/users')
    ->uses('Users\UserController@show')
    ->name('user.show');

Route::get('/maintenance')
    ->uses('Maintenance\MaintenanceController@show')
    ->name('maintenance.show');
