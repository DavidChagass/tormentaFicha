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
       Schema::create('personagens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('nome');
            $table->string('raca');
            $table->string('classe');
            $table->string('divindade')->nullable();
            $table->integer('nivel')->default(1);
                //atributos
            $table->integer('forca')->default(0);
            $table->integer('destreza')->default(0);
            $table->integer('constituicao')->default(0);
            $table->integer('inteligencia')->default(0);
            $table->integer('sabedoria')->default(0);
            $table->integer('carisma')->default(0);
                //status
            $table->integer('hp_atual')->default(1);
            $table->integer('hp_maximo')->default(1);
            $table->integer('mp_atual')->default(1);
            $table->integer('mp_maximo')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       Schema::dropIfExists('personagens');
    }
};
