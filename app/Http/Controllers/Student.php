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
use App\User;
use App\levels;
use App\courses;
use App\students;
use App\teachers;
use App\sections;
use App\categories;

class Student extends Controller
{
    private function get_student_code( $studentId ){
        return students::getStudentById( $studentId )[0]['linkCode'];
    }

    public function get_my_parent(){
        $studentId      = Auth::User()->id;
        $parentId       = students::getParentByStudentId( $studentId );
        if(sizeof( $parentId ) > 0){
            $parentData = User::getUserById( $parentId[0]['parentId'] );
        }else{ $parentData = []; }
        return view( 'studentModules.student_parent' , [ 
            'parentDetails' => $parentData ,
            'studentCode'   => $this->get_student_code( $studentId )
        ] );
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
