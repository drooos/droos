<?php

/*namespace App\Http\Controllers;

//use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;*/


namespace App\Http\Controllers;
use App\groupRequests;
use App\courseGroups;
use App\Http\Controllers\Controller;
use Auth;

class Student extends Controller
{
    public function get_my_parent(){
        $userId = Auth::User()->id;
    }

    public function joinGroup( $groupId ){

        if (Auth::User()->userRule != "student") {
            return redirect('/home');
        }

        if ( courseGroups::groupExist($groupId) && !groupRequests::requsetExist($groupId,Auth::User()->id)){ // && req ! exist
            $req = new groupRequests();
            $req->studentId = Auth::User()->id ;
            $req->groupId = $groupId;
            $req->save();
        }

        return redirect('/home');

    }

}
