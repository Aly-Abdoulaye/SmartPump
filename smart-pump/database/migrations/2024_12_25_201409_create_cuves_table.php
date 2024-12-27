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
            $table->foreignId('station_id')->constrained('stations')->onDelete('cascade'); // Relation avec stations
            $table->decimal('capacite', 10, 2); // Capacité maximale
            $table->decimal('niveau_actuel', 10, 2); // Niveau actuel
            $table->decimal('seuil_minimum', 10, 2); // Seuil minimum
            $table->string('type_carburant'); // Type de carburant (essence, diesel)
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cuves');
    }
}
