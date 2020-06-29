<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class attendanses extends Model
{
    protected $guarded = [];
    public static function isStudentAttendSection( $sectionId, $studentId  ){
        return sizeof(attendanses::where('sectionId', $sectionId)->where('studentId', $studentId)->get());
    }
}
