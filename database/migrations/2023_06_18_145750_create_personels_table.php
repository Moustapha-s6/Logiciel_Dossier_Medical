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
        Schema::create('personels', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('matricule');
            $table->string('nom');
            $table->string('prenom');
            $table->string('username');
            $table->string('adresse');
            $table->string('genre');
            $table->string('role');
            $table->string('telephone');
            $table->string('status');
            $table->string('email')->unique();
            $table->string('date_adhesion');
            $table->integer('etat')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personels');
    }
};
