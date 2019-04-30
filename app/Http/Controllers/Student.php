<?php

/*namespace App\Http\Controllers;

//use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;*/


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\levels;
use App\courses;
use App\students;
use App\teachers;
use App\sections;
use App\categories;
use App\courseGroups;
use App\groupRequests;

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

}
