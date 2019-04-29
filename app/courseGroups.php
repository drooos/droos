<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class courseGroups extends Model
{
    protected $guarded = [];
    public static function getGroupsByCourseId( $courseId ){
        return courseGroups::where('courseId', $courseId)->get();
    }

    public static function getGroupsByTeacherId( $teacherId ){
        return courseGroups::where('teacherId', $teacherId)->get();
    }
}
