<?php

/*namespace App\Http\Controllers;

//use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;*/


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Auth;

class Student extends Controller
{
    public function get_my_parent(){
        $studentId      = Auth::User()->id;
        $parentData     = students::getParentByStudentId( $studentId );
        if(sizeof( $parentData ) > 0){
            User::getUserById( $parentData[0]['parentId'] );
        }

    }

}
