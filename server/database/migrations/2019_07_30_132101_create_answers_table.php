<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email');
            $table->integer('question 1');
            $table->integer('question 2');
            $table->integer('question 3');
            $table->integer('question 4');
            $table->integer('question 5');
            $table->integer('question 6');
            $table->integer('question 7');
            $table->integer('question 8');
            $table->integer('question 9');
            $table->integer('question 10');
            $table->string('perspective');
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
        Schema::dropIfExists('answers');
    }
}
