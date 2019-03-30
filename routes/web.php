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

Route::get('/', function () {
    return view('layout');
    //return view('courses.teacherCourse');
});

Auth::routes();

Route::get('signup', function(){
    return view('auth.register');
});
Route::view('test','layouts.app');
