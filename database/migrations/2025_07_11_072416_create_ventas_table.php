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
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('idhdp');
            $table->integer('revision');
            $table->boolean('aceptada')->default(false);
            $table->string('cantidad')->nullable();
            $table->string('oferta')->nullable();
            $table->dateTime('plazo')->nullable(); // Assuming this is in days
            $table->text('texto')->nullable();
            $table->string('trabajo')->nullable();
            $table->string('codigo')->nullable();
            $table->dateTime('fecha')->nullable();
            $table->string('codigo_padre')->nullable();
            $table->text('notas')->nullable();
            $table->text('motivo_rechazo')->nullable();
            $table->text('texto_otros')->nullable();
            $table->string('sustituido_por')->nullable();
            $table->string('anexos')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};
