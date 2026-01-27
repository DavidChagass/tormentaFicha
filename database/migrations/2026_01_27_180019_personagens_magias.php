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
          Schema::create('personagens_magia', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personagem_id')->constrained()->onDelete('cascade');
            $table->string('nome');
            $table->integer('circulo');
            $table->string('escola');
            $table->string('execucao');
            $table->string('alcance');
            $table->string('alvo');
            $table->string('duracao');
            $table->string('resistencia')->nullable();
            $table->longText('descricao');
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
