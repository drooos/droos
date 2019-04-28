<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    public static function getAllCategories(){
        return categories::all();
    }
}
