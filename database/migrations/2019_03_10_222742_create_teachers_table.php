<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->unsignedBigInteger('teacherId'); // Refers to users.userId
            //$table->unsignedBigInteger('teacherCategory');
            $table->string('teacherDetails');
            $table->float('teacherRate');
            $table->timestamps();
            $table->foreign('teacherId')->references('id')->on('users');
            //$table->foreign('teacherCategory')->references('categoryId')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teachers');
    }
}
