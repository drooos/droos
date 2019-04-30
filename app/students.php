<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class students extends Model
{
    //this guarded for all tables columns allowed to fill
    protected $guarded = [];

    /* ------------------------------------------------------------------------------
        this function return son with access code and not linked for another son
        @params
            *** sonCode : code of son <generated when account created>
        @return 
            *** result of select query <linkCode-ParentId>
            may 0|1 record 
        @NOTE<sonCode NOT UNIQUE>
        ------------------------------------------------------------------------------
    */
    public static function getSonByCodeToLink($sonCode){
        $studentWithCode = students::where('linkCode', $sonCode)->whereNull('parentId')->get();
        return $studentWithCode;
    }

    public static function getStudentById($studentId){
        $studentWithCode = students::where('studentId', $studentId)->get();
        return $studentWithCode;
    }

    public static function linkSonToParent($studentId,$parentId){
        students::where('studentId',$studentId)->update(['parentId'=>$parentId]);
    }

    public static function getSonsByParentId($parentId){
        return students::where('parentId',$parentId)->get();
    }

    public static function getParentByStudentId( $studentId ){
        return students::where('studentId',$studentId)->get();
    }
}
