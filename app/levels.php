<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class levels extends Model
{
    public static function getAllLevels(){
        return levels::all();
    }

    public static function getLevelById( $levelId ){
        return levels::where('id', $levelId)->get();
    }
}
