<?php
// auth routs <login - signup>
Auth::routes();

//default route logic "not finished"
Route::get('/', function () {return view('layout');});

// routes for accounts
Route::get('/home', 'users@redirectUser');
Route::get('profile', 'Profile@getProfile');
Route::post('Profile/Edit','HomeController@updateTeacher');
Route::get('/logout', 'users@logout');

// time table
Route::get('timeTable',function(){return view('timeTable.timeTable');});

//admin routs
Route::get('manage_users', 'admin@getPending');
Route::post('manage_users', 'admin@verifyAccount');


// testing routs
Route::get('testc', 'users@getInfoForActiveUser');
