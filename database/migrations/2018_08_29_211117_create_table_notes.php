<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableNotes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes',function(Blueprint $table){
            $table->increments('id');
            $table->integer('author')->unsigned();
            $table->string('subject');
            $table->text('notes');
            $table->string('files')->nullable();            
            $table->string('file_type')->nullable();
            $table->integer('created_by')->unsigned();
            $table->timestamps();

            $table->foreign('author')->references('id')->on('leads')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('notes');
    }
}
