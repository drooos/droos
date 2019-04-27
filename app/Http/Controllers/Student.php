<?php

/*namespace App\Http\Controllers;

//use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;*/


namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Student extends Controller
{
    //
    public static function getSonByCodeToLink($sonCode){
        $studentWithCode = Student::get();//->where('parentId',NULL);
    }
}
