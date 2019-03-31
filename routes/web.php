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

Route::get('home', function() {
    return View('dashboard.profile');
});

Route::get('/profile/{id}', function ($id) {
    return view('dashboard.profile')->with('id',$id);
});

Route::get('signup', function(){
    return view('auth.register');
});

Route::view('test','layouts.app');
