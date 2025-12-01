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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();

            // Relación 1:N estándar (sin 'unique')
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            //$table->foreignId('user_id')->constrained();

            $table->string('title', 150); // Limitamos a 150 caracteres
            $table->text('description')->nullable();

            // Enum: Solo permite estos valores exactos
            $table->enum('status', ['pending', 'active', 'completed'])
                ->default('pending');

            $table->date('deadline')->nullable();

            // Decimal: Para presupuestos (10 dígitos en total, 2 decimales)
            $table->decimal('budget', 10, 2)->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
