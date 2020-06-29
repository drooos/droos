<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssistantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assistants', function (Blueprint $table) {
            $table->unsignedBigInteger('assistantId'); // Refers to users.userId
            $table->unsignedBigInteger('teacherId'); // Refers to teachers.teacherId
            $table->timestamps();
            $table->foreign('assistantId')->references('id')->on('users');
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
        Schema::dropIfExists('assistants');
    }
}
