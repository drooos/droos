<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class groupRequests extends Model
{
    public static function getPenddingRequestsByGroupId( $groupId ){
        return groupRequests::where('groupId', $groupId)->where('isAcc', false)->get();
    }

    public static function getGroupStudentByGroupId( $groupId ){
        return groupRequests::where('groupId', $groupId)->where('isAcc',1)->get();
    }

    public static function getGroupsByStudentId( $studentId ){
        return groupRequests::where('studentId', $studentId)->where('isAcc', 1)->get();
    }

    public static function activateStudentByIdAndGroupId( $studentId, $groupId ){
        groupRequests::where('studentId', $studentId)->where('groupId',$groupId)->update(['isAcc'=>1]);
    }

    public static function deleteRequestByStudentAndGroupId( $studentId, $groupId ){
        groupRequests::where('studentId', $studentId)->where('groupId',$groupId)->update(['isAcc'=>2]);
    }

    public static function leaveGroupByStudentIdAndGroupId( $studentId, $groupId ){
        groupRequests::where('studentId', $studentId)->where('groupId',$groupId)->update(['isAcc'=>3]);
    }
}
