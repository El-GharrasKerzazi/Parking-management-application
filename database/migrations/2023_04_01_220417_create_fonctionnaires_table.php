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
            $table->string('cin');
            $table->string('nom');
            $table->string('prenom');
            $table->integer('age');
            $table->string('grade');
            $table->unsignedBigInteger('parc_id');
            $table->foreign('parc_id')->references('id')->on('parcs')->onDelete("cascade");
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
