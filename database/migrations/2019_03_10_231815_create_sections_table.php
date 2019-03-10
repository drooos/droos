<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->bigIncrements('sectionId');
            $table->date('sectionDate');
            $table->integer('sectionNumber');
            $table->unsignedBigInteger('groupId'); // refers to coursegroups.groupId
            $table->timestamps();
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
        Schema::dropIfExists('sections');
    }
}
