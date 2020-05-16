<?php

use Illuminate\Database\Seeder;

class levelsTable extends Seeder
{
    public $subjects = array(
        array(1,"الاول الابتدائي"),
        array(2,"الثاني الابتدائي"),
        array(3,"الثالث الابتدائي"),
        array(4,"الرابع الابتدائي"),
        array(5,"الخامس الابتدائي"),
        array(6,"السادس الابتدائي"),
        array(7,"الاول الاعدادي"),
        array(8,"الثاني الاعدادي"),
        array(9,"الثالث الاعدادي"),
        array(10," الاول الثانوي"),
        array(11," الثاني الثانوي"),
        array(12," الثالث الثانوي"),

    );
    public function run()
    {
        foreach($this->subjects as $subject){
            DB::table('levels')->insert(
                [
                    'id'=> $subject[0],
                    'levelName'=> $subject[1]
                ]
            );
        }
        
    }
}
