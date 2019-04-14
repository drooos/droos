<?php

namespace App\Http\Controllers;

use App\User;
use App\pendingAccounts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Admin extends Controller
{
    public function getPending(){
    	$users = pendingAccounts::where('approved', 0)->get();
    	return view('adminModules.manage_users', [
    		'users' => $users
    	]);
    }

    public function verifyAccount(){
    	//--check if admin--
    	$id = request()->name;
    	$user = pendingAccounts::where('userId', $id)
    		->update(['approved' => 1]);
    	return $this->getPending();
    }
}
