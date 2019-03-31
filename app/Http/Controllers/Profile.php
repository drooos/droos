<?php

namespace App\Http\Controllers;
	
use App\User;
use App\pendingAccounts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class profile extends Controller
{
    public function getProfile(){
    	//$user = User::find(Auth::user()->id);
    	$user = [
    		'Id' => "test",
    		'Name' => 'Test',
    		"Img" => 'imgs/test.jpg',
    		"Desc" => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
    		'Role' => 'instructor',
    		'Rate' => 10,
    		'Courses' => [
    			1 => "Course1",
    			2 => "Course2",
    			3 => "Course3",
    			4 => "Course4"
    		],
    		'Announcements' => [
    			1 => "Annoucement1",
    			2 => "Annoucement2",
    			3 => "Annoucement3",
    			4 => "Annoucement4"
    		]
    	];

    	return view('dashboard.profile', [
    		'user' => $user
    	]);
    }
}
