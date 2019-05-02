<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\User;
use \App\UserFactory;

class users extends Controller
{
    /*
        this function know what is user Role
    */
    public function __construct(){
        return $this->middleware('auth');
    }

    public static function getUserRole(){
        return Auth::user()->userRule;
    }
    
    public function redirectUser(){
        switch( Auth::user()->userRule ){
            case "teacher":
                return view('profiles.profile');
            break;
            default: 
                return view('profiles.profile');
            break;
        }
    }

    public static function getUserSideContent($userType){
        $navContent = [];
        switch ( $userType ){
            case "teacher":
                $navContent[] = ["icon"=>"far fa-tachometer-alt","title"=>"الرئيسية","link"=>"/home"];
                $navContent[] = ["icon"=>"far fa-user","title"=>" الصفحة الشخصية","link"=>"/Profile"];
                $navContent[] = ["icon"=>"fas fa-plus-square","title"=>"اضافة كورس","link"=>"/teacher/addCourse"];
                $navContent[] = ["icon"=>"fas fa-rocket","title"=>"الكورسات","link"=>"/teacher/teacherCourses"];
                $navContent[] = ["icon"=>"fas fa-history","title"=>"الطلبات المعلقة","link"=>"/course/groups/pending"];
                $navContent[] = ["icon"=>"far fa-bell","title"=>" الاشعارات","link"=>"/notification"];
                $navContent[] = ["icon"=>"far fa-chart-pie","title"=>" جدول الحصص","link"=>"/teacher/TimeTabel"];

                
            break;
            case "admin":
                $navContent[] = ["icon"=>"far fa-tachometer-alt","title"=>"الرئيسية","link"=>"/student_course_show"];
                $navContent[] = ["icon"=>"fas fa-history","title"=>"الحسابات المعلقة","link"=>"/manage_users"];
                $navContent[] = ["icon"=>"far fa-user","title"=>" الصفحة الشخصية","link"=>"/Profile"];
                $navContent[] = ["icon"=>"far fa-bell","title"=>" الاشعارات","link"=>"/notification"];
                $navContent[] = ["icon"=>"fal fa-plus-circle","title"=>"اضافة ادمن جديد","link"=>"/addnewadmin"];
            break;

            case "student":
                //$navContent[] = ["icon"=>"far fa-tachometer-alt","title"=>"الرئيسية","link"=>"/dashboard"];
                $navContent[] = ["icon"=>"far fa-bell","title"=>" جميع المواد","link"=>"/allcourses"];
                $navContent[] = ["icon"=>"far fa-user","title"=>" الصفحة الشخصية","link"=>"/Profile"];
                $navContent[] = ["icon"=>"far fa-bolt","title"=>"ولي الامر","link"=>"/student/parent"];
                $navContent[] = ["icon"=>"far fa-bell","title"=>" الاشعارات","link"=>"/notification"];
                $navContent[] = ["icon"=>"fal fa-plus-circle","title"=>"جدولي","link"=>"/student/timeTable"];
                $navContent[] = ["icon"=>"fal fa-plus-circle","title"=>"عرض الكورسات","link"=>"/student_course_show"];

            break;
            case "parent":
                $navContent[] = ["icon"=>"far fa-tachometer-alt","title"=>"الرئيسية","link"=>"/student_course_show"];
                $navContent[] = ["icon"=>"far fa-user","title"=>" الصفحة الشخصية","link"=>"/Profile"];
                $navContent[] = ["icon"=>"far fa-table","title"=>"جدول الابناء","link"=>"/sons/timeTable"];
                $navContent[] = ["icon"=>"fal fa-child","title"=>"ابنائي","link"=>"/parent/mySons"];
                $navContent[] = ["icon"=>"far fa-bell","title"=>" الاشعارات","link"=>"notification"];
            break;
        }
        return $navContent;
    }
        
    public static function getSide(){
        return self::getUserSideContent(self::getUserRole());
    }

    public static function getInfoForActiveUser(){
        $activeUser = User::where('id', Auth::user()->id)->get();
        return  $activeUser;
        //return view('dashboard.profile', ['user'=>$users]);
    }

    public function logout(){
        return view('includes.components.logout');
    }

    public function VisitProfile ($id){
        $user = User::where('id', $id)->get();
        $usr = $user[0];
        $userDB = UserFactory::build($usr->userRule);

        switch($usr->userRule){
                
            case "parent": {
                $usr = $userDB::where('parentId', $id)->join('users', 'parents.parentId', '=', 'users.id')->select('parents.*', 'users.*')->get();
                return view('profiles.visitProfile', ['user'=>$usr[0]]);
            }
            break;
            case "teacher": {
                $usr = $userDB::where('teacherId', $id)->join('users', 'teachers.teacherId', '=', 'users.id')->get();
                return view('profiles.visitProfile', ['user'=>$usr[0]]);
            }
            break;
            case "student": {
                $usr = $userDB::where('studentId', $id)->join('users', 'students.studentId', '=', 'users.id')->get();
                return view('profiles.visitProfile', ['user'=>$usr[0]]);
            }
            break;

        }

        
        
        return view('profiles.visitProfile', ['user'=>$usr]);
    }

}
