<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class courseGroups extends Model
{
    public static function getGroupsByCourseId( $courseId ){
        return courseGroups::where('courseId', $courseId)->get();
    }
}
