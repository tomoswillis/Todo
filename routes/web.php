<?php

Route::get('/')
    ->uses('Home\HomeController')
    ->name('home.show');

Route::get('/categories')
    ->uses('Tasks\CategoryController@show')
    ->name('categories.show');


Route::get('/tasks/{categoryId}')
    ->uses('Tasks\TaskController@show')
    ->name('task.show');

Route::get('/foo')
    ->uses('Tasks\FooController@show')
    ->name('foo.show');
