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
        Schema::create('routines', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // título de la rutina
            $table->text('description')->nullable(); // descripción de la rutina
            $table->string('file_path'); // ruta del archivo PDF
            $table->foreignId('coach_id')->constrained('users')->onDelete('cascade'); // coach que subió la rutina
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('routines');
    }
};
