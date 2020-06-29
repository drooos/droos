<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Teahcer extends Controller
{
    public function __construct(){
        return $this->middleware('auth');
    }
    
    public static function getTeacherById( $teacherId ){
        return Teahcer::where('teacherId', $teacerId)->get();
    }
}
