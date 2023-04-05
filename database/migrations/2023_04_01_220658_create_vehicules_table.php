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
            $table->string('matricule');
            $table->string('type');
            $table->string('marque');
            $table->date('date_assurance');
            $table->string('mission');
            $table->unsignedBigInteger('fonctionnaire_id');
            $table->foreign('fonctionnaire_id')->references('id')->on('fonctionnaires')->onDelete("cascade");
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
