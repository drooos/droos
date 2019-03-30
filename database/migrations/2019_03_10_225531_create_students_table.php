<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->unsignedBigInteger('studentId'); // Refers to users.userId
            $table->unsignedBigInteger('parentId')->default(0); // Refers to parents.parentId
            $table->timestamps();
            $table->foreign('studentId')->references('id')->on('users');
            $table->foreign('parentId')->references('parentId')->on('parents');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
