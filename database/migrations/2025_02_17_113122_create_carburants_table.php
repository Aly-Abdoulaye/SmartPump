<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('carburants', function (Blueprint $table) {
            $table->id();
            $table->string('nom')->unique();
            $table->decimal('prix_unitaire', 10, 2); // Prix par litre
            $table->timestamps();
        });

        Schema::table('bons_dachat', function (Blueprint $table) {
            $table->foreignId('carburant_id')->after('code_bon')->constrained('carburants')->onDelete('cascade');
            $table->decimal('quantite', 10, 2)->after('carburant_id');
            $table->decimal('montant', 10, 2)->nullable()->change(); // Calculé automatiquement
        });
    }

    public function down()
    {
        Schema::table('bons_dachat', function (Blueprint $table) {
            $table->dropForeign(['carburant_id']);
            $table->dropColumn(['carburant_id', 'quantite']);
        });

        Schema::dropIfExists('carburants');
    }
};
