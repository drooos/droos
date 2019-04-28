<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Teahcer extends Controller
{
    public static function getTeacherById( $teacherId ){
        return Teahcer::where('teacherId', $teacerId)->get();
    }
}
