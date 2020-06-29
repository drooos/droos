<?php

namespace App\Http\Controllers;

use App\User;
use App\sections;
use App\attendanses;
use App\groupRequests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class section extends Controller
{
    public function __construct(){
        return $this->middleware('auth');
    }
    public function create_new_section( $groupId ){
        $isCreated           = sections::getSectionByDateAndGroupId( date('Y-m-d') , $groupId);
        $sectionNumber       = sections::getSectionNumberByGroupId( $groupId );
        if(sizeof( $isCreated ) == 0){
            $sectionId           = \DB::table('sections')->insertGetId([
                "sectionDate"       => date('Y-m-d'),
                "groupId"           => $groupId,
                "sectionNumber"     => $sectionNumber,
            ]);
        }else{ $sectionId   = $isCreated[0]['sectionId']; }
        $sectionStudents    = groupRequests::getGroupStudentByGroupId( $groupId );
        $students           = [];
        foreach( $sectionStudents as $student ){
            if( attendanses::isStudentAttendSection($sectionId,$student['studentId']) > 0){
                continue;
            }
            $studentData    = User::getUserById($student['studentId']);
            $students[] = [
                "studentFname"  => $studentData[0]['userFname'],
                "studentLname"  => $studentData[0]['userLname'],
                "studentId"     => $student['studentId'],
                "studentImage"  => "imgs/male.png"
            ];
        }
        
        return view('course_sections.newSection',[
            'students'          => $students,
            'sectionNumber'     => $sectionNumber,
            'sectionId'         => $sectionId
            ]);
    }

    public function take_attendance(Request $request){
        $allStudents        = $request->all();
        $sectionId          = $allStudents['sectionId'];
        foreach($allStudents as $studentid => $value){
            if(is_numeric($studentid)){
                attendanses::create([
                    'studentId'=>$studentid,
                    'sectionId'=>$sectionId
                ]);
            }
        }
    return back();
    }

}
