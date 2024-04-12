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
        Schema::create('dossierpatients', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('matricule');
            $table->string('nom');
            $table->string('prenom');
            $table->string('sexe');
            $table->string('adresse');
            $table->string('email')->unique();
            $table->string('date_naissance');
            $table->string('lieu_naissance');
            $table->string('genre');
            $table->string('nationalite');
            $table->string('groupe_sanguin');
            $table->string('antecedant');
            $table->string('allergies');
            $table->string('observation_medical');
            $table->string('nom_du_pere');
            $table->string('nom_de_la_mere');
            $table->integer('etat')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dossierpatients');
    }
};
