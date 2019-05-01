<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeacherCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_categories', function (Blueprint $table) {
            $table->unsignedBigInteger('teacherId');
            $table->unsignedBigInteger('categoryId');
            $table->foreign('teacherId')->references('teacherId')->on('teachers');
            $table->foreign('categoryId')->references('categoryId')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teacher_categories');
    }
}
