<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('missions', function (Blueprint $table) {
            $table->id()->primaryKey();
            $table->integer('CodeMission');
            $table->date('DateDepart');
            $table->date('DateRetour');
            $table->string('Lieu');
            $table->string('Object');
            $table->string('Ville');
            $table->unsignedBigInteger('vehicule_id');
            $table->foreign('vehicule_id')->references('id')->on('vehicules')->onDelete("cascade");
            $table->unsignedBigInteger('fonctionnaire_id');
            $table->foreign('fonctionnaire_id')->references('id')->on('fonctionnaires')->onDelete("cascade");
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
        Schema::dropIfExists('missions');
    }
}
