<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateParentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parents', function (Blueprint $table) {
            $table->unsignedBigInteger('parentId'); // Refers to users.userId
            $table->string('linkCode');
            $table->timestamps();
            $table->foreign('parentId')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('parents');
    }
}
