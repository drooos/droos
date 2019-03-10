<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_groups', function (Blueprint $table) {
            $table->unsignedBigInteger('studentId'); // Refers to students.studentId
            $table->unsignedBigInteger('groupId'); // Refers to groups.groupId
            $table->timestamps();
            $table->foreign('studentId')->references('studentId')->on('students');
            $table->foreign('groupId')->references('groupId')->on('course_groups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_groups');
    }
}
