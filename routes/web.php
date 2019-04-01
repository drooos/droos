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
Auth::routes();

Route::get('/', function () {
    return view('layout');
});
Route::get('/home', 'Profile@getProfile');

Route::get('logout', function(){
    return view('dashboard.components.logout');
});
//Route::view('login','login');

Route::post('addsubjects',function(){
    
Route::get('home', function() {
    return View('dashboard.profile');
});

Route::get('/profile/{id}', function ($id) {
    return view('dashboard.profile')->with('id',$id);
});

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
//Route::get('/home', 'HomeController@index')->name('home');

Route::get('get', 'Admin@getPending');
Route::get('active', 'Admin@verifyAccount');
Route::get('profile', 'Profile@getProfile');
Route::get('manage_users', 'admin@getPending');
Route::post('manage_users', 'admin@verifyAccount');

Route::get('timeTable',function(){
    return view('timeTable.timeTable');
});
