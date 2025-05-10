<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('users', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('email')->unique();
        $table->string('password');
        $table->enum('role', ['superadmin','admin', 'manager', 'employee', 'technician']);
        $table->unsignedBigInteger('station_id')->nullable(); // FK pour les gérants et employés
        $table->foreignId('id_compagnies')->nullable()->constrained()->onDelete('set null');
        $table->foreign('station_id')->references('id')->on('stations')->onDelete('set null');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
