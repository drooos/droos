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
        //dd($allDataFromForm);
        return back();
    }

    private function generate_time_table_array_from_groups( $teacherId ){
        $times              = courseGroups::getGroupsByTeacherId( $teacherId );
        $allGroupsTimes     = [];
        foreach( $times as $time ){
            $courseData     = courses::getCourseId          ( $time['courseId']             );
            $courseCategory = categories::getCategoryById   ( $courseData[0]['categoryId']  );
            $level          = levels::getLevelById          ( $courseData[0]['courseLevel'] );
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
        //dd($allTeacherTable);
        return view('teacherModules.teacher_timeTable',[ 'times' => $allTeacherTable] );
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



}
