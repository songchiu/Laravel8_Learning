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

/*
Route::get('/', function () {
    return view('welcome');
});

Can be simplify as below
*/
Route::view('/', 'welcome')->name('welcome');

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

Route::get('/posts/{id}', function($id){
    $posts = [
        1 => [
            'title' => 'Intro to Laravel',
            'content' => 'This is a short intro to Laravel'
        ],
        2 => [
            'title' => 'Intro to PHP',
            'content' => 'This is a short intro to PHP'
        ]
    ];

    abort_if(!isset($posts[$id]), 404);

    return view('posts.show', ['post' => $posts[$id]]);//using dot to seperate directory and file
});

Route::get('/condition_render/{id}', function($id){
    $posts = [
        1 => [
            'title' => 'Intro to Laravel',
            'content' => 'This is a short intro to Laravel',
            'is_true' => true,
            'isset_test' => true
        ],
        2 => [
            'title' => 'Intro to PHP',
            'content' => 'This is a short intro to PHP',
            'is_true' => false
        ]
    ];

    abort_if(!isset($posts[$id]), 404);

    return view('posts.condition', ['post' => $posts[$id]]);//using dot to seperate directory and file
});