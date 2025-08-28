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
        Schema::create('participantes', function (Blueprint $table) {
            $table->id();
            $table->string('numero');
            $table->string('revision');
            $table->string('creador');
            $table->string('imasd');
            $table->string('costos');
            $table->string('ventas');
            $table->string('produccion')->nullable();
            $table->string('compras')->nullable();
            $table->string('calidad');
            $table->string('logistica')->nullable();
            $table->timestamps();

            // Puedes añadir más campos según tus necesidades
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
