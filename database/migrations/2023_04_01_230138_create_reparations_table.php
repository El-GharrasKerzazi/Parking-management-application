<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReparationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reparations', function (Blueprint $table) {
            $table->id()->primarykey();
            $table->integer('Numero_reparation');
            $table->date('Date_reparation');
            $table->string('Type_reparation');
            $table->double('Prix_reparation', 8, 2);
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
        Schema::dropIfExists('reparations');
    }
}
