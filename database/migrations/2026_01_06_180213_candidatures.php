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
        schema::create('candidatures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('recrutement_id')->constrained('recrutements')->onDelete('cascade');
            $table->foreignId('etape_id')->nullable()->constrained('etapes_recrutements')->onDelete('cascade');
            $table->string('nom_candidat');
            $table->string('prenom_candidat');
            $table->string('email_candidat');
            $table->string('cv_path');
            $table->string('telephone_candidat');
            $table->text('lettre_motivation');
            $table->date('date_candidature');
            $table->enum('statut', ['reçu','présélectionné','en_attente', 'accepté', 'refusé'])->default('reçu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
