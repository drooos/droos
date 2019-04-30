<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class courseGroups extends Model
{
    public static function getGroupsByCourseId( $courseId ){
        return courseGroups::where('courseId', $courseId)->get();
    }

    public static function getGroupsByTeacherId( $teacherId ){
        return courseGroups::where('teacherId', $teacherId)->get();
    }

    public static function groupExist ($groupId){
        if(courseGroups::where('groupId', $groupId)->exists()){
            return true;
        }
        return false;
    }

}
