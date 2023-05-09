<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiculesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicules', function (Blueprint $table) {
            $table->id()->primarykey();
            $table->string('Matricule');
            $table->string('Type');
            $table->string('Marque');
            $table->double('Kilometrage', 8, 2);
            $table->string('TypeCarb');
            $table->date('DateDebutAssurance');
            $table->double('CoutCarburant', 8, 2);
            $table->double('CoutAssurance', 8, 2);
            $table->double('CoutReparation', 8, 2);
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
        Schema::dropIfExists('vehicules');
    }
}
