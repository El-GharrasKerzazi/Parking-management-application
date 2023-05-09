<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarburantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carburants', function (Blueprint $table) {
            $table->id()->primarykey();
            $table->integer('NemuroCarburant');
            $table->date('DateCarburant');
            $table->double('Kilometrage', 8, 2);
            $table->double('Quantite', 8, 2);
            $table->double('Prix', 8, 2);
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
        Schema::dropIfExists('carburants');
    }
}
