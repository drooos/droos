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
Route::get('/', function () {return view('layout');});
Route::get('/home', 'users@redirectUser');
Route::get('/logout', 'users@logout');
Route::get('login', function(){return view('auth.login');});
Auth::routes();
Route::get('signup', function(){return view('auth.register');});
Route::view('test','courses.courseActions.addCourse');
Route::get('get', 'Admin@getPending');
Route::get('active', 'Admin@verifyAccount');
Route::get('profile', 'Profile@getProfile');
Route::get('manage_users', 'admin@getPending');
Route::post('manage_users', 'admin@verifyAccount');
Route::get('timeTable',function(){return view('timeTable.timeTable');});


Route::get('testc', 'users@getInfoForActiveUser');