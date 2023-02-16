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
        Schema::create('qcmlistes', function (Blueprint $table) {
            $table->id();
            $table->integer('idqcm');
            $table->integer('NbrQuestion');
            $table->integer('NbrReponse');
            $table->integer('NbrChiffreEtudiant');
            $table->string('matiere');
            $table->string('libelle');
            $table->boolean('ligneRemonde')->default(true);
            $table->boolean('Notation')->default(true);
            $table->integer('Point')->default(0);
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
        Schema::dropIfExists('qcmlistes');
    }
};
