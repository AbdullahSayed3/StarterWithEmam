<?php

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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/test1', function () {
    return "Welcome to Test 1!";
});

// Route Parameters

// Required Parameter with route name like "->name('a')"
Route::get('/show-number/{id}', function ($id) {

    return "welcome ya $id";
})->name('a');


// Optional Parameter
Route::get('/show-string/{id?}', function () {

    return "welcome ya ";
})->name('b');

// Namespaces

Route::namespace('Frontend')->group(function () {
    // all routes here only has access in controller or methods in folder named Frontend
    Route::get('users', 'UserController@showUserName');
});

// Prefix

// Route::prefix('users')->group(function(){
//     Route::get('show','UserController@showUserName');
//     Route::delete('delete','UserController@showUserName');
//     Route::get('edit','UserController@showUserName');
//     Route::put('update','UserController@showUserName');
// });

// another way to make group

Route::group(['prefix' => 'users'], function () {

    Route::get('/', function () {
        return "welcome from another way to make group routes";
    });

    Route::get('show', 'UserController@showUserName');
    Route::delete('delete', 'UserController@showUserName');
    Route::get('edit', 'UserController@showUserName');
    Route::put('update', 'UserController@showUserName');
});

Route::get('check',function(){
    return "middleware auth";
})->middleware('auth');
