<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\levels;
use App\courses;
use App\teachers;
use App\sections;
use App\categories;
use App\courseGroups;
use App\groupRequests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class group extends Controller
{
    public function action_on_pending_account( $action, $id , $group ){
        echo $action. $id . $group;
        if( $action == 'active' ){
            groupRequests::activateStudentByIdAndGroupId( $id, $group );
        }elseif( $action == 'delete' ){
            groupRequests::deleteRequestByStudentAndGroupId( $id, $group );
        }
        return back();
    }

    public function student_leave_group_by_group_id( $groupId ){
        $studentId  = Auth::User()->id;
        groupRequests::leaveGroupByStudentIdAndGroupId( $studentId, $groupId );
        return back();
    }
}
