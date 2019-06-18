<?php

Route::get('/', 'albumsController@index');

Route::get('/album/create', 'albumsController@create');

Route::post('/album/store', 'albumsController@store');

Route::get('/album', 'albumsController@index');

Route::get('/album/{id}', 'albumsController@show');

Route::get('/photos/create/{id}', 'photosController@create');

Route::delete('/photos/{id}', 'photosController@destroy');

Route::post('/photos/store', 'photosController@store');
