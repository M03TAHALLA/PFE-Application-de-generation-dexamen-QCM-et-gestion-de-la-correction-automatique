<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->boolean('1');
            $table->boolean('2');
            $table->boolean('3');
            $table->boolean('4');
            $table->boolean('5');
            $table->boolean('A');
            $table->boolean('T');
            $table->integer('idEtudiant');
            $table->integer('QuestionNum');
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
        Schema::dropIfExists('questions');
    }
};
