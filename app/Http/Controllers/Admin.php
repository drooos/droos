<?php

namespace App\Http\Controllers;

use App\User;
use App\pendingAccounts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Admin extends Controller
{

	public function __construct(){
		return $this->middleware('auth');
	}
    public function getPending(){
		$pending_users = User::get_pending_users();
		return view('adminModules.admin_manage_users', [
			'users' => $pending_users
		]);
    }

    public function verifyAccount(){
		$id = request()->name;
		User::activate_account( $id );
		return back();
	}

	public function redirectUser(){
		echo Auth::user()->userRule;
		switch( Auth::user()->userRule ){
				case "teacher":
				//    return view('profiles.profile');
				break;
				
				default: 
				//return view('profiles.profile');
				break;
		}
	}
}
