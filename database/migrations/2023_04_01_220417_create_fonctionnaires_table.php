<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFonctionnairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fonctionnaires', function (Blueprint $table) {
            $table->id()->primarykey();
            $table->string('Cin');
            $table->string('Nom');
            $table->string('Prenom');
            $table->string('Sexe');
            $table->date('DateNaissance');
            $table->string('LieuNaissance');
            $table->string('Email');
            $table->integer('Tel');
            $table->string('Adresse');
            $table->string('Service');
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
        Schema::dropIfExists('fonctionnaires');
    }
}
