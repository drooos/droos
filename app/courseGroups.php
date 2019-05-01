<?php

namespace App;
use App\studentGroups;
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

    public static function IsFullGroup ($groupId){
        $group = courseGroups::where('groupId', $groupId)->get();
        $groupsLimit = $group[0]->groupLimit;
        $count = studentGroups::where('groupId', $groupId)->count();
        if($groupsLimit == $count){
            return true;
        }
        return false;
    }

}
