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
    return view('timeTable.timeTable');
    //return view('courses.teacherCourse');
});

Auth::routes();

Route::get('signup', function(){
    return view('auth.register');
});
Route::view('test','layouts.app');

Route::get('profile', 'Profile@getProfile');

Route::get('manage_users', 'admin@getPending');
Route::post('manage_users', 'admin@verifyAccount');