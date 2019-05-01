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

        //check user role
        if (Auth::User()->userRule != "student") { // Mosh Student
            return redirect('/home');
        }
        //check group limit
        if(courseGroups::IsFullGroup($groupId)){ // Malyan Ya3ny
            return redirect('/home');
        }
        //check coursegroup & grouprequest existance 

        if ( courseGroups::groupExist($groupId) && !groupRequests::requsetExist($groupId,Auth::User()->id)){
            $req = new groupRequests();
            $req->studentId = Auth::User()->id ;
            $req->groupId = $groupId;
            $req->save();
        }

        return redirect('/home');

    }

}
