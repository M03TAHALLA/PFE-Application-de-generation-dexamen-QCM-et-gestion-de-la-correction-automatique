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
        Schema::create('reponse_etuds', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('Matricule');
            $table->boolean('A')->default(0);
            $table->boolean('B')->default(0);
            $table->boolean('C')->default(0);
            $table->boolean('D')->default(0);
            $table->boolean('E')->default(0);
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
        Schema::dropIfExists('reponse_etuds');
    }
};
