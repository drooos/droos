<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materials', function (Blueprint $table) {
            $table->bigIncrements('materialId');
            $table->string('materialUrl');
            $table->date('materialUploadate');
            $table->unsignedBigInteger('groupId');// refers to coursegroups.groupId
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
        Schema::dropIfExists('materials');
    }
}
