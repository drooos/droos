<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('postId');
            $table->string('postText');
            $table->string('postPhotourl');
            $table->date('postDate');
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
        Schema::dropIfExists('posts');
    }
}
