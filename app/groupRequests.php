<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class groupRequests extends Model
{
    public static function getPenddingRequestsByGroupId( $groupId ){
        return groupRequests::where('groupId', $groupId)->where('isAcc', false)->get();
    }

    public static function getGroupStudentByGroupId( $groupId ){
        return groupRequests::where('groupId', $groupId)->where('isAcc',true)->get();
    }
    
}
