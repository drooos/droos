<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class error extends Controller
{

    public static function getMessege(){
        $errormessage = [
            'ده انت راجل ***',
            'مش عيب عليك تبقي اب وهكر',
            'ياااه عليك ده انا بهزر',
            'ياجدع انت مش عيب عليك نبقي عاملينك موقع وهكر كدا',
            'شحط فعلا',
            'ليييه ليييه',
            'xD',
            'اسامحك ازاي وانا تعبان وعايز تهكرني',
            'قبل ما تعمل ريكويست اتاكدت عليه',
            'اديديديدي دادادا',
            'مش موجود',
            'عشان اسيبك تشوف داتا الناس التانية'
        ];
        $errorPhoto =[
            '1.jfif',
            '2.jfif',
            '3.jpg',
            '4.jfif',
            '5.jpg',
            '6.jfif',
            '7.jpg',
            '8.png',
            '9.png',
            '10.jfif',
            '11.jpg',
            '12.jpg',
        ];
        $index = rand(0,sizeof($errorPhoto)-1);
        $arr = [
            'image'=>$errorPhoto[$index],
            'comment'=>$errormessage[$index]
        ];
        return $arr;
    }
}
