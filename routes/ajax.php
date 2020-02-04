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
    ->name('department.store');

Route::get('/department/delete/{department}')
    ->uses('Departments\DepartmentController@destroy')
    ->name('department.destroy');

Route::post('/department/edit/{department}')
    ->uses('Departments\DepartmentController@update')
    ->name('department.update');

Route::post('/category/store')
    ->uses('Categories\CategoryController@store')
    ->name('category.show');

Route::get('/category/delete/{category}')
    ->uses('Categories\CategoryController@destroy')
    ->name('category.destroy');

Route::post('/category/edit/{category}')
    ->uses('Categories\CategoryController@update')
    ->name('category.update');
