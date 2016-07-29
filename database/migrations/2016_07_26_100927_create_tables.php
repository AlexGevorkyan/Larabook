<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Topics', function (Blueprint $table) {
            $table->increments('id');
            $table->string('topicname',25)->unique();
            $table->timestamps();
            });

        Schema::create('Blocks', function(Blueprint $table) 
        {           
            $table->increments('id'); 
            $table->string('title',50);          
            $table->integer('position')->default(0);
            $table->integer('topicid')->unsigned();
            $table->foreign('topicid')->references('id')->on('Topics')->onDelete('cascade');
            $table->string('text',5120)->default('');            
            $table->string('imagepath',255);
            $table->timestamps();           
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Topics');
        Schema::drop('Blocks'); 
    }
}
