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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('matricule');
            $table->string('nom_patient');
            $table->string('departement');
            $table->string('medecin');
            $table->string('date_rv');
            $table->string('temps');
            $table->string('telephone_patient');
            $table->string('status');
            $table->string('message');
            $table->string('email_patient')->unique();
            $table->integer('etat')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
