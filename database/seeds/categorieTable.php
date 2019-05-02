<?php

use Illuminate\Database\Seeder;

class categorieTable extends Seeder
{
    public $subjects = array(
        array(1,"اللغة العربية"),
        array(2,"اللغة الانجليزية"),
        array(3,"الدراسات الاجتماعية"),
        array(4,"العلوم"),
        array(5,"الحساب"),
        array(6,"رياضة تطبقية"),
        array(7,"رياضة بحتة"),
        array(8,"الاحياء"),
        array(9,"الجولوجيا"),
        array(10,"الفيزياء"),
        array(11,"الكمياء"),
        array(12,"الاحصاء"),

    );
    public function run()
    {
        foreach($this->subjects as $subject){
            DB::table('categories')->insert(
                [
                    'categoryId'=> $subject[0],
                    'categoryName'=> $subject[1]
                ]
            );
        }
        
    }
}
