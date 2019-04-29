<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sections extends Model
{
    public static function getSectionByGroupId( $groupId ){
        return sections::where('groupId', $groupId)->get();
    }

    public static function getSectionNumberByGroupId( $groupId ){
        $number_of_sections = sizeof(sections::where('groupId', $groupId)->get()) + 1;
        return $number_of_sections;
    }

    public static function getSectionByDateAndGroupId( $sectionDate, $groupId){
        return sections::where('groupId', $groupId)->where('sectionDate', $sectionDate)->get();
    }
}
