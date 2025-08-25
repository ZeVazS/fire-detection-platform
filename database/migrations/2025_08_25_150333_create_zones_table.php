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
        Schema::create('zones', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('gps'); // podes trocar para point() se usares MySQL com GIS
            $table->enum('risco', ['baixo', 'médio', 'alto'])->default('baixo');
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // dono da zona
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zones');
    }
};
