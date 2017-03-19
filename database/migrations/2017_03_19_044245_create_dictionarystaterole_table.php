<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDictionarystateroleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dictionary_state_role', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dictionary_id')->unsigned();
            $table->integer('role_id')->unsigned();
            $table->enum('state_id', ['Allowed', 'Rejected']);
            $table->foreign('dictionary_id')->references('id')->on('dictionary');
            $table->foreign('role_id')->references('id')->on('roles');
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
        Schema::drop('dictionary_state_role');
    }
}
