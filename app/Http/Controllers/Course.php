<?php

namespace App\Http\Controllers;
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
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use \Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
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
            'courseId'  => $courseId,
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

    private function generate_time_table_array_by_student_id( $studentId ){
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

    public function get_student_time_table(){
        $studentId = Auth::User()->id;
        $times = [];
        $times = $this->generate_time_table_array_by_student_id($studentId);
        return view( 'studentModules.student_time_table',
            ['times'=>$times]
        );
    }

    public function get_student_courses(){
        $studentId  = Auth::User()->id;
        $times      = $this->generate_time_table_array_by_student_id( $studentId );
        return view('courses.studentCourses', ['studentCourses' => $times]);
    }
    public function addMaterial(Request $request)
    {   
        $request->validate([
            'file'=> 'required_if:update,false|mimes:pdf,doc,ppt,xls,docx,pptx,xlsx,rar,zip|max:1000',
        ]);
        
        if($file = $request->file('file')){
            $extension = $file->getClientOriginalExtension();
            $name = date('Y-m-d-H-i-s', strtotime(date('Y-m-d H:i:s'))).$request['courseId'].".".$extension;
            
            if($file->move('Materials', $name)){
                $mat = new materials();
                $mat->materialUrl = $name;
                $mat->materialUploadate = date('Y-m-d H:i:s');
                $mat->courseId = $request['courseId'];
                $mat->save();
                return redirect()->back();
            }
        }
        return redirect()->back();

    }




    public function getstudentscourses(){
        $studentId      = Auth::User()->id;
        $courses        = courses::getStudentsCourses( $studentId );

        return view('courses.student_course_show')->with('courses', $courses);
    }

    public function getallcourses(Request $request){
        $courses    = courses::getAllCourses();
        $allCourses = [];
        foreach( $courses as $course ){
            $courseCategory = categories  ::getCategoryById  ( $course['categoryId']  );
            $level          = levels      ::getLevelById     ( $course['courseLevel'] );
            $teacherDetails = User        ::getUserById      ( $course['teacherId']   );
            $allGroups      = courseGroups::getGroupsByCourseId( $course['courseId'] );
            $allCourses[] = [
                "courseId"              => $course['courseId'],
                "level"                 => $level[0]['levelName'],
                "course_desc"           => $course['courseDescription'],
                "teacher_first_name"    => $teacherDetails[0]['userFname'],
                "teacher_last_name"     => $teacherDetails[0]['userLname'],
                "teacher_photo"         => $teacherDetails[0]['imagePath'],
                "subject"               => $courseCategory[0]['categoryName'],
                "groups_numbers"        => sizeof($allGroups)
            ];
        }
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $itemCollection = collect($allCourses);
        $perPage = 3;
        $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
        $paginatedItems= new LengthAwarePaginator($currentPageItems , count($itemCollection), $perPage);
        $paginatedItems->setPath($request->url());
        return view('studentModules.allcourses', ['allCourses' => $paginatedItems]);
    }

    public function get_course_details_with_groups( $courseId ){
        $courseGroups   = courseGroups  ::getGroupsByCourseId ( $courseId              );
        $courseData     = courses       ::getCourseId         ( $courseId              );
        $courseCategory = categories    ::getCategoryById     ( $courseData[0]['categoryId']  );
        $level          = levels        ::getLevelById        ( $courseData[0]['courseLevel'] );
        $teacherDetails = User          ::getUserById         ( $courseData[0]['teacherId']   );
        $groupLimit     = [];

        if( sizeof($courseGroups) ){
            foreach( $courseGroups as $group ){
                $groupLimit[] = sizeof(groupRequests::getGroupStudentByGroupId($group['groupId']));
            }
        }
        return view('courses.course_details_groups',[
            'groups'        => $courseGroups,
            'courseData'    => $courseData[0],
            'level'         => $level[0]['levelName'],
            'subject'       => $courseCategory[0]['categoryName'],
            'teacherData'   => $teacherDetails[0],
            'groupLimit'    => $groupLimit
        ]);
    }
}
