<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\courses;
use Auth;
use App\levels;
use App\categories;
class Course extends Controller
{
    public function get_new_course_form(){
        $allLevels      = levels::getAllLevels();
        $allSubjects    = categories::getAllCategories();
        return view('courses.courseActions.addCourse',[
            "levels"    => $allLevels,
            "subjects"  => $allSubjects
        ]);
    }

    public function add_new_course(Request $request){
        $request->validate([
            'level' => 'required|max:10',
            'subject'=>'required',
            'desc'=>'required'
        ]);
        courses::create([
            'teacherId'=>Auth::User()->id,
            'courseDescription'=>$request['desc'],
            'courseLevel'=>$request['level'],
            'categoryId'=>$request['subject']
        ]);
        return redirect('home');
    }

}
