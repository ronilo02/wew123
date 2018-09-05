<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableLeads extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads',function(Blueprint $table){
            $table->increments('id');
            $table->string('firstname');
            $table->string('middlename')->nullable();
            $table->string('lastname');
            $table->string('email')->unique();
            $table->string('website')->nullable();
            $table->string('mobile_phone')->nullable();
            $table->string('office_phone')->nullable();
            $table->string('home_phone')->nullable();
            $table->string('other_phone')->nullable();
            $table->string('street')->nullable();
            $table->string('city')->nullable();
            $table->string('state');
            $table->string('postal_code');
            $table->integer('country')->unsigned();
            $table->text('remarks')->nullable();
            $table->integer('assigned_to')->unsigned();
            $table->integer('researcher')->unsigned();
            $table->integer('status')->unsigned();
            $table->timestamps();

            $table->foreign('assigned_to')->references('id')->on('users');
            $table->foreign('country')->references('id')->on('countries');
            $table->foreign('researcher')->references('id')->on('users');
            $table->foreign('status')->references('id')->on('lead_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('leads');
    }
}
