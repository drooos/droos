<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

use App\User;

class users extends Controller
{
    /*
        this function know what is user Role
    */
    public static function getUserRole(){
        return (int)Auth::user()->userRule;
    }
    
    public static function redirectUser(){
        switch( self::getUserRole() ){
            case "teacher":
                return view('dashboard.profile');
            break;
            default: break;
        }
    }

    public static function getUserSideContent($userType){
        $navContent = [];
        switch ( $userType ){
            case "teacher":
                $navContent[] = ["icon"=>"far fa-tachometer-alt","title"=>"الرئيسية","link"=>"/home"];
                $navContent[] = ["icon"=>"far fa-user","title"=>" الصفحة الشخصية","link"=>"/profile"];
                $navContent[] = ["icon"=>"far fa-bell","title"=>" الاشعارات","link"=>"/notification"];
                $navContent[] = ["icon"=>"far fa-chart-pie","title"=>" حصصي","link"=>"/timeTable"];
                
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
                $navContent[] = ["icon"=>"far fa-bell","title"=>" الاشعارات","link"=>"/notification"];
                $navContent[] = ["icon"=>"fal fa-plus-circle","title"=>"جدولي","link"=>"/addnewadmin"];
            break;
        }
        return $navContent;
    }
        
    public static function getSide(){
        //return self::getUserSideContent(self::getUserRole());
        return self::getUserSideContent(self::getUserRole());
    }

    public static function getInfoForActiveUser(){
        $activeUser = User::where('id', Auth::user()->id)->get();
        return  $activeUser;
        //return view('dashboard.profile', ['user'=>$users]);
    }

    public function logout(){
        return view('dashboard.components.logout');
    }
}
