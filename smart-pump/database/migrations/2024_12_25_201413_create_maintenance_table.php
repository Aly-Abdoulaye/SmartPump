<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('maintenance', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pompe_id')->constrained('pompes')->onDelete('cascade');
            $table->date('date_intervention');
            $table->string('type_intervention');
            $table->foreignId('technicien_id')->constrained('utilisateurs')->onDelete('cascade');
            $table->enum('statut', ['en_cours', 'termine'])->default('en_cours');
            $table->text('commentaires')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maintenance');
    }
};
