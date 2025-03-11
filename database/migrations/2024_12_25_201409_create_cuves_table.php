<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuvesTable extends Migration
{
    public function up()
{
    Schema::create('cuves', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('station_id');
        $table->unsignedBigInteger('carburant_id');
        $table->decimal('capacite', 10, 2);
        $table->decimal('niveau_actuel', 10, 2);
        $table->decimal('seuil_minimum', 10, 2);
        $table->timestamps();

        // Définition des clés étrangères
        $table->foreign('station_id')->references('id')->on('stations')->onDelete('cascade');
        $table->foreign('carburant_id')->references('id')->on('carburants')->onDelete('cascade');
    });
}


    public function down()
    {
        Schema::dropIfExists('cuves');
    }
}
