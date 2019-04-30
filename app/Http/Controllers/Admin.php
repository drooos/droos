<?php

namespace App\Http\Controllers;

use App\User;
use App\pendingAccounts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Admin extends Controller
{
    public function getPending(){
		$pending_users = User::get_pending_users();
		return view('adminModules.admin_manage_users', [
			'users' => $pending_users
		]);
    }

    public function verifyAccount(){
    	//--check if admin--
		$id = request()->name;
		$user = pendingAccounts::where('userId', $id)
			->update(['approved' => 1]);
		return $this->getPending();
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
