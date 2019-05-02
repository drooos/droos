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
    public static function getUserRole(){
        return Auth::user()->userRule;
    }
    
    public static function redirectUser(){
        switch( self::getUserRole() ){
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
                $navContent[] = ["icon"=>"fas fa-plus-square","title"=>"اضافة كورس","link"=>"/teacher/addCourse"];
                $navContent[] = ["icon"=>"fas fa-rocket","title"=>"الكورسات","link"=>"/teacher/teacherCourses"];
                $navContent[] = ["icon"=>"far fa-user","title"=>" الصفحة الشخصية","link"=>"/profile"];
                $navContent[] = ["icon"=>"far fa-bell","title"=>" الاشعارات","link"=>"/notification"];
                $navContent[] = ["icon"=>"far fa-chart-pie","title"=>" جدول الحصص","link"=>"/teacher/TimeTabel"];
                
            break;
            case "Admin":
                $navContent[] = ["icon"=>"far fa-tachometer-alt","title"=>"الرئيسية","link"=>"/dashboard"];
                $navContent[] = ["icon"=>"far fa-user","title"=>" الصفحة الشخصية","link"=>"/profile"];
                $navContent[] = ["icon"=>"far fa-bell","title"=>" الاشعارات","link"=>"/notification"];
                $navContent[] = ["icon"=>"fal fa-plus-circle","title"=>"اضافة ادمن جديد","link"=>"/addnewadmin"];
            break;

            case "student":
                $navContent[] = ["icon"=>"far fa-tachometer-alt","title"=>"الرئيسية","link"=>"/dashboard"];
                $navContent[] = ["icon"=>"far fa-user","title"=>" الصفحة الشخصية","link"=>"/profile"];
                $navContent[] = ["icon"=>"far fa-bolt","title"=>"ولي الامر","link"=>"/student/parent"];
                $navContent[] = ["icon"=>"far fa-bell","title"=>" الاشعارات","link"=>"/notification"];
                $navContent[] = ["icon"=>"fal fa-plus-circle","title"=>"جدولي","link"=>"/addnewadmin"];
            break;
            case "parent":
                $navContent[] = ["icon"=>"far fa-tachometer-alt","title"=>"الرئيسية","link"=>"dashboard"];
                $navContent[] = ["icon"=>"far fa-user","title"=>" الصفحة الشخصية","link"=>"/profile"];
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
