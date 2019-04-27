<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\courses;
use Auth;

class Course extends Controller
{
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
        //dd($request);
    }
}
