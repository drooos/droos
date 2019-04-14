<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_groups', function (Blueprint $table) {
            $table->bigIncrements('groupId');
            $table->enum('groupDay', array('Sat','Sun','Mon','Tue','Wed','Thu','Fri'));
            $table->dateTime('groupTime');
            $table->string('groupLocation');
            $table->unsignedBigInteger('courseId'); //Refers to courses.courseId
            $table->unsignedBigInteger('teacherId'); //Refers to teachers.teacherId
            $table->timestamps();
            $table->foreign('courseId')->references('courseId')->on('courses');
            $table->foreign('teacherId')->references('teacherId')->on('teachers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_groups');
    }
}
