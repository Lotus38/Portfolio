<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function (){});

Route::get('/user', 'App\Http\Controllers\UserController@getUser');



