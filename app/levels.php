<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class levels extends Model
{
    public static function getAllLevels(){
        return levels::all();
    }
}
