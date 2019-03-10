<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendansesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendanses', function (Blueprint $table) {
            $table->unsignedBigInteger('studentId'); // Refers to students.studentId
            $table->unsignedBigInteger('sectionId'); // Refers to sections.sectionId
            $table->timestamps();
            $table->foreign('studentId')->references('studentId')->on('students');
            $table->foreign('sectionId')->references('sectionId')->on('sections');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendanses');
    }
}
