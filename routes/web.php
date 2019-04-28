<?php
// auth routs <login - signup>
Auth::routes();

//default route logic "not finished"
Route::get('/', function () {return view('layout');});

// routes for accounts
Route::get('/home', 'users@redirectUser');
//Route::get('profile', 'Profile@getProfile');
Route::post('Profile/Edit','HomeController@updateTeacher');
Route::get('/logout', 'users@logout');

//parent modules
Route::view('parent/linkSon', 'parentModules.link_son');
Route::post('parent/linkSon', 'Parents@link_parent_to_son');
Route::post('parent/finishLink', 'Parents@finish_link');
Route::get('parent/mySons','parents@parent_sons');
// time table
Route::get('timeTable',function(){return view('timeTable.timeTable');});

//teacher modules
Route::get('teacher/addCourse', 'Course@get_new_course_form');
Route::post('teacher/addCourse', 'Course@add_new_course');

//admin routs
Route::get('manage_users', 'admin@getPending');
Route::post('manage_users', 'admin@verifyAccount');

//student modules
Route::get('student/parent', 'student@get_my_parent');

// testing routs
Route::get('testc', 'users@getInfoForActiveUser');


