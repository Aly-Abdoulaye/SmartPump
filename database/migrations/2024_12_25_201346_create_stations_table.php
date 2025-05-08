<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStationsTable extends Migration
{
    public function up()
    {
        Schema::create('stations', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('localisation');
            $table->string('code_station')->unique();
            $table->foreignId('id_user')->nullable(); // On attend la table users
            $table->enum('status', ['active', 'inactive', 'maintenance'])->default('active');
            $table->timestamps();
        });        
    }

    public function down()
    {
        Schema::dropIfExists('stations');
    }
}
