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
Auth::routes();

Route::get('/', function () {
    return view('layout');
});

Route::get('/home', function () {
    $id = Auth::user()->id; 
    return $id;
    //return view('courses.teacherCourse');
});

Auth::routes();

Route::get('signup', function(){

    return view('auth.register');
});

Route::view('test','layouts.app');

Route::get('get', 'Admin@getPending');
Route::get('active', 'Admin@verifyAccount');
