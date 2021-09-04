<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/get_test/{id}', function ($id) {
    return 'hi~ the id is '.$id;
});

Route::get('/optional_para/{num?}', function ($num=20) {
    return 'hi~ the number is '.$num;
});

Route::get('/constraint_para/{num}', function ($num) {
    return 'hi~ the number is '.$num;
})->where([
    'num' => '[0-9]+'
]);
//another place to set constraint is at RouteServiceProvider.php
//which can make setting to the whole web

Route::get('/subdir', function(){
    return view('home.subdir');//using dot to seperate directory and file
});