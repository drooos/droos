<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\levels;
use App\courses;
use App\teachers;
use App\sections;
use App\materials;
use App\categories;
use App\courseGroups;
use App\groupRequests;

class adapterController extends Controller
{
    public static function Adapt_generate_time_table_array_from_groups( $teacherId ){
        $times              = courseGroups::getGroupsByTeacherId( $teacherId );
        $allGroupsTimes     = [];
        foreach( $times as $time ){
            $courseData     = courses   ::getCourseId           ( $time['courseId']             );
            $courseCategory = categories::getCategoryById       ( $courseData[0]['categoryId']  );
            $level          = levels    ::getLevelById          ( $courseData[0]['courseLevel'] );
            $allGroupsTimes[$time['groupDay']][] = [
                "groupId"               => $time['time'],
                "courseId"              => $time['courseId'],
                "groupDay"              => $time['groupDay'],
                "teacherId"             => $time['teacherId'],
                "groupLimit"            => $time['groupLimit'],
                "groupLocation"         => $time['groupLocation'],
                "categoryName"          => $courseCategory[0]['categoryName'],
                "courseLevel"           => $level[0]['levelName'],
                "courseDescription"     => $courseData[0]['courseDescription'],
                "groupTime"             => date("H:i", strtotime($time['groupTime'])),
                "endTime"               => date("H:i", strtotime($time['groupTime'])+7200),
            ];
        }
        return $allGroupsTimes;
    }

    public static function Adapt_get_course_full_data ( $courseId ){
        $course         = courses::getCourseId              ( $courseId );
        $level          = levels::getLevelById              ( $course [0]['courseLevel'] );
        $categorie      = categories::getCategoryById       ( $course [0]['categoryId']  );
        $teacherData    = User::getUserById                 ( $course [0]['teacherId']   );
        $courseGroups   = courseGroups::getGroupsByCourseId ( $courseId );
        $teacherDesc    = teachers::GetTeacherDetails       ();
        
        $coursesDetails = [
            "id"        => $course      [0]['courseId'],
            "level"     => $level       [0]['levelName'],
            "subject"   => $categorie   [0]['categoryName'],
            "desc"      => $course      [0]['courseDescription'],
            "tFname"    => $teacherData [0]['userFname'],
            "tLname"    => $teacherData [0]['userLname'],
            "teacherId" => $course      [0]['teacherId'],
            "tDesc"     => $teacherDesc,
            "groups"    => sizeof( $courseGroups ),
        ];
        return $coursesDetails;
    }

    public static function Adapt_generate_time_table_array_by_student_id( $studentId ){
        $getAllgroupsForCurrentStudent = groupRequests::getGroupsByStudentId( $studentId );
        $allGroupsTimes = [];
        foreach( $getAllgroupsForCurrentStudent as $group){
            $groupDetails   = courseGroups::getGroupByGroupId( $group['groupId']             );
            $courseData     = courses     ::getCourseId      ( $groupDetails[0]['courseId']  );
            $courseCategory = categories  ::getCategoryById  ( $courseData[0]['categoryId']  );
            $level          = levels      ::getLevelById     ( $courseData[0]['courseLevel'] );
            $teacherDetails = User        ::getUserById      ( $courseData[0]['teacherId']   );
            $allGroupsTimes[$groupDetails[0]['groupDay']][] = [
                "groupId"               => $groupDetails[0]['groupId'],
                "courseId"              => $groupDetails[0]['courseId'],
                "groupDay"              => $groupDetails[0]['groupDay'],
                "teacherId"             => $groupDetails[0]['teacherId'],
                "groupLimit"            => $groupDetails[0]['groupLimit'],
                "groupLocation"         => $groupDetails[0]['groupLocation'],
                "categoryName"          => $courseCategory[0]['categoryName'],
                "courseLevel"           => $level[0]['levelName'],
                "teacher_first_name"    => $teacherDetails[0]['userFname'],
                "teacher_last_name"     => $teacherDetails[0]['userLname'],
                "teacher_photo"         => $teacherDetails[0]['imagePath'],
                "courseDescription"     => $courseData[0]['courseDescription'],
                "groupTime"             => date("H:i", strtotime($groupDetails[0]['groupTime'])),
                "endTime"               => date("H:i", strtotime($groupDetails[0]['groupTime'])+7200),
                "groupDay"              => $groupDetails[0]['groupDay']
            ];
        }
        //dd($allGroupsTimes);
        return $allGroupsTimes;
    }

    public static function Adapt_get_pending_request_array(){
        $teacherId      = Auth                  ::User()->id;
        $allGroups      = courseGroups          ::getGroupsByTeacherId( $teacherId );
        $allRequests    = [];
        foreach( $allGroups as $group ){
            $allGroupRequest = groupRequests    ::getPenddingRequestsByGroupId( $group['groupId'] );
            if(sizeof($allGroupRequest) > 0){
                $courseData         = courses   ::getCourseId( $group['courseId'] );
                $categoryName       = categories::getCategoryById($courseData[0]['categoryId']);
                $level              = levels    ::getLevelById($courseData[0]['courseLevel']);
                foreach( $allGroupRequest as $oneRequest ){
                    $studentData    = User      ::getUserById( $oneRequest['studentId'] );
                    $allRequests[]  = [
                        "student_id"        => $studentData[0]['id'],
                        "studentf_name"     => $studentData[0]['userFname'],
                        "studentl_name"     => $studentData[0]['userLname'],
                        "groupDay"          => $group['groupDay'],
                        "groupTime"         => $group['groupTime'],
                        "student_img"       => "imgs\male.png",
                        "subject_name"      => $categoryName[0]['categoryName'],
                        "level"             => $level[0]['levelName'],
                        "group_id"          => $group['groupId']
                    ];
                }
            }
        }
        return $allRequests;
    }
}
