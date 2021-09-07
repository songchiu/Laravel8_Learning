<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SingleController;
use Illuminate\Http\Request; //this line is vital
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
Route::view('/', 'welcome')->name('welcome');
*/

//##############################################################################
Route::get('/', [HomeController::class, 'home'])->name('welcome');

Route::get('/single_controller', SingleController::class);

//If controller class has many actions, we had to provide an array with class name and action name
//If controller class has only one action, just provice their class name
//##############################################################################

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

Route::get('/posts', function () {
    //dd(request()->all()); this will output data in json format

    dd(request()->input('limit', 5));//5 is default value

    //we can use "query" to replace "input"
    //but "query" can only retrieve values from the "query string"
    //(which is send in the web URL.
    //"include" retrieve values from "request payload")
    //
    // BTW, there are lots of methods for $request
    // such as: has, whenHas, hasAny, filled, whenFilled, missing
    // get more information at: https://laravel.com/docs/8.x/requests
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

Route::get('/condition_render/{id}', function($id) use ($posts){
    abort_if(!isset($posts[$id]), 404);

    return view('posts.condition', ['post' => $posts[$id]]);//using dot to seperate directory and file
});

Route::get('/for', function() use ($posts){

    return view('posts.for', ['posts' => $posts]);//using dot to seperate directory and file
});

Route::get('/responses', function() use ($posts){
  return response($posts, 201)
    ->header('Content-Type', 'application/json')
    ->cookie('TEST_COOKIE', 'cookie content', 3600);
});

Route::prefix('/play')->name('play.')->group(function() use($posts) {
    Route::get('/redirect', function(){
        return redirect('/optional_para');
    })->name('redirect');
    
    Route::get('/back', function(){
        return back();//return to the previous page
    })->name('back');
    
    Route::get('/redirect-namedroute', function(){
        return redirect()->route('welcome');
        //now we can see the important of naming route!
    })->name('redirect-namedroute');
    
    Route::get('/away', function(){
        return redirect()->away('https://140.115.81.230');
        //"away" can redirect the page to the https url
    })->name('away');
    
    Route::get('/json', function() use ($posts){
        return response()->json($posts);
    })->name('json');
    
    Route::get('/download', function() {
        return response()->download(public_path('/picture/ncu.png'), 'download_pic_name.png');
        //using "public_path" to access "public" directory
    })->name('download');
});

Route::get('/auth_middleware/{id}', function ($id) {
    return 'hi~ the id is '.$id;
})->name('auth_middleware')->middleware('auth');

