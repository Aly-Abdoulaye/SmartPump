<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuvesTable extends Migration
{
    public function up()
    {
        Schema::create('cuves', function (Blueprint $table) {
            $table->id(); // Clé primaire
            $table->foreignId('station_id')->constrained('stations')->onDelete('cascade'); // Relation avec stations
            $table->decimal('capacite', 10, 2); // Capacité maximale (en litres)
            $table->decimal('niveau_actuel', 10, 2); // Niveau actuel (en litres)
            $table->decimal('seuil_minimum', 10, 2); // Seuil minimum (en litres)
            $table->foreignId('carburant_id')->constrained('carburants')->onDelete('cascade'); // Relation avec carburants
            $table->timestamps(); // Colonnes created_at et updated_at
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('cuves');
    }
}
