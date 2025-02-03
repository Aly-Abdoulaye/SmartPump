<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStationsTable extends Migration
{
    public function up()
    {
        Schema::create('stations', function (Blueprint $table) {
            $table->id(); // Clé primaire
            $table->string('nom'); // Nom de la station
            $table->string('localisation'); // Localisation
            $table->string('code_station')->unique(); // Code unique
            $table->boolean('etat')->default(true); // Actif ou non
            $table->foreignId('id_user')->nullable()->constrained('utilisateurs')->onDelete('set null'); // Relation vers utilisateurs
            $table->timestamps(); // Colonnes created_at et updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('stations');
    }
}
