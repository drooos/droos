<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $guarded = [];
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function getUserById($userId){
        $userById = User::where('id', $userId)->get();
        return $userById;
    }

    public static function get_pending_users(){
        return User::where('verified',0)->where('userRule','!=','Admin')->get();
    }

    public static function activate_account( $userId ){
        User::where('id', $userId )->update(['verified'=>'1']);
    }
}
