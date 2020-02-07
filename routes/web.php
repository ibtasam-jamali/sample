<?php

// Controller-name@method-name
Route::get('/', 'ProductsController@index'); // localhost:8000/
Route::get('/{id}', 'ProductsController@index');
Route::post('/save', 'ProductsController@save');
Route::get('/deleteProduct/{id}', 'ProductsController@deleteProduct');