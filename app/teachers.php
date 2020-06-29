<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class teachers extends Model
{
    //
    protected $guarded = [];

    public static function GetTeacherDetails(){
        $teacher = teachers::where('teacherId', Auth::user()->id )->get();
        if(sizeof($teacher)>0){
            return  $teacher[0]->teacherDetails ;
        }else{
            return "";
        }
    }

}
