<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('courseId');
            $table->unsignedBigInteger('categoryId'); //Refers to categories.categoryId
            $table->string('courseDescription');
            $table->string('courseLevel');
            $table->unsignedBigInteger('teacherId'); //Refers to teachers.teacherId
            $table->timestamps();
            $table->foreign('categoryId')->references('categoryId')->on('categories');
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
        Schema::dropIfExists('courses');
    }
}
