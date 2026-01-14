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
        Schema::create('recrutements', function (Blueprint $table) {
            $table->id();

            $table->string('titre');
            $table->text('description');
            $table->enum('type_contrat', ['CDI', 'CDD', 'Stage']);
            $table->date('date_limite');
            $table->enum('statut', ['ouvert', 'fermé'])->default('ouvert');
            $table->timestamps();
            $table->foreignId('service_id')->constrained('services')->onDelete('cascade');
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
