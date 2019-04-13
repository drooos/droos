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
<<<<<<< HEAD
use Illuminate\Support\Facades\Input;
=======
Auth::routes();
>>>>>>> be780c091d2cf871ccd17b82c624672660686126

Route::get('/', function () {
    return view('layout');
});
Route::get('/home', 'Profile@getProfile');

<<<<<<< HEAD
//Route::view('login','login');
Route::post('login',function(){

});
Route::post('addsubjects',function(){
=======
Route::get('home', function() {
    return View('dashboard.profile');
});

Route::get('/profile/{id}', function ($id) {
    return view('dashboard.profile')->with('id',$id);
});
>>>>>>> master

  $subject=new App\categories;
  $subject->categoryName = Input::get('subject');
  $subject->created_at = Input::get('fdate');
  $subject->updated_at= Input::get('ldate');
  $subject->save();

  return view('auth.addsubjects');
}
);
Route::get('login', function(){
    return view('auth.login');
});
Auth::routes();
Route::get('addsubjects', function(){
    return view('auth.addsubjects');
});
Route::get('signup', function(){

    return view('auth.register');
});

Route::view('test','layouts.app');
<<<<<<< HEAD
//Route::get('/home', 'HomeController@index')->name('home');
=======

=======
Route::get('signup', function(){return view('auth.register');});
Route::view('test','courses.courseActions.addCourse');
>>>>>>> 39140abfe87d6596442a29bc37018829fd9d7b2a
Route::get('get', 'Admin@getPending');
Route::get('active', 'Admin@verifyAccount');
>>>>>>> be780c091d2cf871ccd17b82c624672660686126
