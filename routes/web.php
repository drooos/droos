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

<<<<<<< HEAD
=======
Route::view('login','login');
Route::view('profile', 'dashboard.profile');
>>>>>>> acbd1b5df7349abb9b7143a82a5885b4eb2507f9
Auth::routes();

Route::get('signup', function(){
    return view('auth.register');
});
Route::view('test','layouts.app');
//Route::get('/home', 'HomeController@index')->name('home');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
