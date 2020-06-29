<?php
namespace App;
use App\parents;
use App\students;
use App\teachers;


class UserFactory {
    public function __construct() {
        // ... //
    }
    public static function build ($className = '') {
        if($className == '') {
            throw new Exception('Invalid User Type.');
        } else {
            // Assuming Class files are already loaded using autoload concept
            switch($className){
                
                case "parent": return new parents();
                break;
                case "teacher": return new teachers();
                break;
                case "student": return new students();
                break;

            }
        }
    }
}

/*
                    $users = DB::table('users') ->join('parents', 'users.id', '=', 'parents.parentId')
                                                ->select('users.*', 'parents.*')
                                                ->where('id', $id)
                                                ->get();
                    return $user;
*/