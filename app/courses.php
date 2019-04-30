<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class courses extends Model
{
    protected $guarded = [];

    public static function getAllCoursesByTeacherId( $teacherId ){
        return courses::where('teacherId', $teacherId)->get();
    }

    public static function getCourseId( $courseId ){
        return courses::where('courseId', $courseId)->get();
    }

    public static function getStudentsCourses( $studentId ){
        return students::where('studentId', $studentId)->get();
    }
    public static function getCourses( ){
        return courses::all();
    }
}
