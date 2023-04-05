<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePannesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pannes', function (Blueprint $table) {
            $table->id()->primarykey();
            $table->string('nom_panne');
            $table->string('type_panne');
            $table->unsignedBigInteger('vehicule_id');
            $table->foreign('vehicule_id')->references('id')->on('vehicules')->onDelete("cascade");
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
        Schema::dropIfExists('pannes');
    }
}
