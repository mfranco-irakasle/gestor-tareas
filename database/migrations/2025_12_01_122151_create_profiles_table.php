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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();

            // Relación 1:1. El 'unique' asegura que un usuario solo tenga UN perfil.
            // constrained() busca automáticamente la tabla 'users' y el campo 'id'.
            // cascadeOnDelete() borra el perfil si borras al usuario.
            $table->foreignId('user_id')
                ->unique()
                ->constrained()
                ->cascadeOnDelete();

            $table->text('bio')->nullable();
            $table->string('github_url')->nullable();
            $table->string('website')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
