<?php

Route::get('/')
    ->uses('Home\HomeController')
    ->name('home.show');

Route::get('/categories')
    ->uses('Tasks\CategoryController@show')
    ->name('categories.show');


Route::get('/tasks')
    ->uses('Tasks\TaskController@show')
    ->name('task.show');

