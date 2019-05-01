<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class parents extends Model
{
    protected $guarded = [];
    public static function getParentByStudentId($studentId){}
}
