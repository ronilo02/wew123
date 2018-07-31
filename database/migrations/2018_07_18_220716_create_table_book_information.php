<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBookInformation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_information',function(Blueprint $table){
            $table->increments('id');
            $table->integer('author')->unsigned();
            $table->string('book_title');
            $table->string('genre');
            $table->string('isbn');
            $table->date('published_date');
            $table->integer('previous_publisher')->unsigned();
            $table->string('book_reference');
            $table->timestamps();
            
            $table->foreign('author')->references('id')->on('leads')
                  ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('previous_publisher')->references('id')->on('publisher');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('book_information');
    }
}
