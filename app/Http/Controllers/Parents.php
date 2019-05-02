<?php

namespace App\Http\Controllers;

use App\students;
use App\User;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Parents extends Controller
{
    public function link_parent_to_son(Request $request){
        $validatedData = $request->validate(['sonCode' => 'required|min:10|max:10']);
        $result = students::getSonByCodeToLink($validatedData['sonCode']);
        $all =array();
        if(sizeof($result)>0){
            foreach($result as $student){
                $all[] = User::getUserById($student->studentId);
            }
        }
        return view('parentModules.link_son',['result'=>$all]);
    }

    public function finish_link(Request $request){
        $studentId = $request->studentId;
        $parentId  = Auth::User()->id;
        students::linkSonToParent($studentId, $parentId);
        return redirect('/parent/mySons');
    }

    public function parent_sons(){
        $sons = students::getSonsByParentId(Auth::User()->id);
        $all =[];
        if(sizeof($sons)>0){
            foreach($sons as $student){
                $all[] = User::getUserById($student->studentId);
            }
        }
        return view('parentModules.show_sons',['sons'=>$all]);
    }
}
