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
        Schema::create('personagens_itens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personagem_id')->constrained()->onDelete('cascade');
            $table->foreignId('item_id')->constrained();
            $table->integer('quantidade')->default(1);
            $table->integer('peso')->default(1);
            $table->longText('descricao')->default(' ');
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
