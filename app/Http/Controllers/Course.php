<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use App\levels;
use App\courses;
use App\students;
use App\teachers;
use App\sections;
use App\materials;
use App\categories;
use App\courseGroups;
use App\groupRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use \Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Controllers\adapterController;
class Course extends Controller
{
    public function __construct(){
        return $this->middleware('auth');
    }
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
        return adapterController::Adapt_get_course_full_data( $courseId );
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

    public function get_course_full_details_by_Id( $courseId ){/////
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
        $materials = DB::table('materials')->where('courseId', $courseId)->get();
        return view('courses.teacherShowCourse', [
            'courseAll' => $courseData,
            'groups'    => $courseGroupsAll,
            'courseId'  => $courseId,
            'materials' => $materials
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
        return adapterController::Adapt_generate_time_table_array_from_groups($teacherId);
    }

    private function generate_time_table_array_by_student_id( $studentId ){
        return adapterController::Adapt_generate_time_table_array_by_student_id();
    }

    public function get_my_time_table(){
        $allTeacherTable            = $this->generate_time_table_array_from_groups( Auth::User()->id );
        return view('teacherModules.teacher_timeTable',[ 'times' => $allTeacherTable] );
    }

    private function get_pending_request_array(){
        return adapterController::Adapt_get_pending_request_array();
    }

    public function get_pending_requests_for_teacher(){
        $allRequests = $this->get_pending_request_array();
        return view('course_group.course_pending_group',['pendingStudents'=>$allRequests]);
    }

    public function get_student_time_table(){
        $studentId = Auth::User()->id;
        $times = [];
        $times = $this->generate_time_table_array_by_student_id( $studentId );
        return view( 'studentModules.student_time_table',
            ['times'=>$times]
        );
    }

    public function get_sons_time_table( $studentId ){
        if(sizeof(students::isSonForThisParent($studentId,Auth::User()->id))){
            $times      = [];
            $times      = $this->generate_time_table_array_by_student_id( $studentId );
            $sonDetails = User::getUserById($studentId);
            return view( 'parentModules.sons_time_table',[
                    'times'=>$times,
                    'student'=>$sonDetails
                ]
            );
        }else{
            $message = error::getMessege();
            return view( 'parentModules.parent_Not_found',[
                "comment" =>$message['comment'],
                "image"=>'errorPics/'.$message['image']
            ]);
        }
        
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

    public function getstudentscourses(){////////////////////////////////////////////////
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
        $perPage = 4;
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
