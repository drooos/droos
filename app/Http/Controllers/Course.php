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
use Illuminate\Support\Facades\Input;
class Course extends Controller
{
    public function get_new_course_form(){
        $allLevels      = levels::getAllLevels();
        $allSubjects    = categories::getAllCategories();
        return view('courses.courseActions.addCourse',[
            "levels"    => $allLevels,
            "subjects"  => $allSubjects
        ]);
    }

    public function add_new_course(Request $request){
        $request->validate([
            'level'     => 'required|max:10',
            'subject'   =>'required',
            'desc'      =>'required'
        ]);
        courses::create([
            'teacherId'=>Auth::User()->id,
            'courseDescription'=>$request['desc'],
            'courseLevel'=>$request['level'],
            'categoryId'=>$request['subject']
        ]);
        return redirect('/teacher/teacherCourses');
    }

    protected function get_course_full_data( $courseId ){
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

    public function get_my_courses(){
        $teacherId      = Auth::User()->id;
        $courses        = courses::getAllCoursesByTeacherId( $teacherId );
        $coursesDetails = [];
        foreach( $courses as $course ){
            $coursesDetails[]   = $this->get_course_full_data( $course->courseId );
        }
        return view('courses.teacherCourse', ['courses' => $coursesDetails]);
    }

    public function get_course_full_details_by_Id( $courseId ){
        $courseData         = $this->get_course_full_data       ( $courseId );
        $courseGroupData    = courseGroups::getGroupsByCourseId ( $courseId );
        $courseGroupsAll    = [];
        foreach( $courseGroupData as $courseGroup ){
            $penGroup           = groupRequests::getPenddingRequestsByGroupId ( $courseGroup['groupId'] );
            $activeStudent      = groupRequests::getGroupStudentByGroupId     ( $courseGroup['groupId'] );
            $sections           = sections::getSectionByGroupId( $courseGroup['groupId'] );
            $courseGroupsAll[]  = [
                'groupId'           => $courseGroup['groupId'],
                'groupDay'          => $courseGroup['groupDay'],
                'groupTime'         => $courseGroup['groupTime'],
                'groupLocation'     => $courseGroup['groupLocation'],
                'courseId'          => $courseGroup['courseId'],
                'teacherId'         => $courseGroup['teacherId'],
                'acctiveStudent'    => sizeof( $activeStudent ),
                'penddingNum'       => sizeof( $penGroup ),
                'sectionNum'        => sizeof( $sections )
            ];
        }
        return view('courses.teacherShowCourse', [
            'courseAll' => $courseData,
            'groups'    => $courseGroupsAll,
            'courseId'  => $courseId
        ]);
    }

    private function days_in_arabic(){
        $daysInArabic   = array(
            array('Sat','السبت'),
            array('Sun','الاحد'),
            array('Mon','الاثنين'),
            array('Tue','الثلاثاء'),
            array('Wed','الاربعاء'),
            array('Thu','الخميس'),
            array('Fri','الجمعة'),
        );
        return $daysInArabic;
    }

    public function go_to_add_group_form( $courseId ){
        
        return view('course_group.course_new_group',[
            'courseId'  =>   $courseId,
            'days'      => $this->days_in_arabic(),
        ]);
    }

    public function add_new_group(Request $request){
        $allDataFromForm    = $request->all();
        $request->validate([
            'day'           => 'required',
            'location'      =>'required',
            'groupLimit'    =>'required'
        ]);
        courseGroups::create([
            'teacherId'     => Auth::User()->id,
            'groupDay'      => $allDataFromForm['day'],
            'groupLocation' => $allDataFromForm['location'],
            'courseId'      => $allDataFromForm['group_id'],
            'groupTime'     => date("H:i",strtotime($allDataFromForm['groupTime'])),
            'groupLimit'    => $allDataFromForm['groupLimit']
        ]);
        return redirect('/teacher/teacherCourses');
    }

    private function generate_time_table_array_from_groups( $teacherId ){
        $times              = courseGroups::getGroupsByTeacherId( $teacherId );
        $allGroupsTimes     = [];
        foreach( $times as $time ){
            $courseData     = courses   ::getCourseId          ( $time['courseId']             );
            $courseCategory = categories::getCategoryById   ( $courseData[0]['categoryId']  );
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

    public function get_my_time_table(){
        $allTeacherTable            = $this->generate_time_table_array_from_groups( Auth::User()->id );
        return view('teacherModules.teacher_timeTable',[ 'times' => $allTeacherTable] );
    }

    private function get_pending_request_array(){
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

    public function get_pending_requests_for_teacher(){
        $allRequests = $this->get_pending_request_array();
        return view('course_group.course_pending_group',['pendingStudents'=>$allRequests]);
    }

}
