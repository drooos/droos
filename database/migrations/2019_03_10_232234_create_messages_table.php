<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->bigIncrements('messageId');
            $table->unsignedBigInteger('recieverId');
            $table->unsignedBigInteger('senderId');
            $table->string('messageText');
            $table->timestamps();
            $table->foreign('recieverId')->references('userId')->on('users');
            $table->foreign('senderId')->references('userId')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
