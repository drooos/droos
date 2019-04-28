<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sections extends Model
{
    public static function getSectionByGroupId( $groupId ){
        return sections::where('sectionId', $groupId)->get();
    }
}
