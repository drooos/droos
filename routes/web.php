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
use Illuminate\Support\Facades\Input;

Route::get('/', function () {
    return view('dashboard.profile');
});



Route::get('login', function(){
    return view('auth.login');
});
Auth::routes();

Route::get('signup', function(){
    return view('auth.register');
});
Route::view('test','layouts.app');
Route::get('/home', 'HomeController@index')->name('home');
