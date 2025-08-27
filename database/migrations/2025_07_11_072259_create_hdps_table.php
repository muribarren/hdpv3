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
        Schema::create('hdps', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->integer('numero');
            $table->integer('revision');
            $table->string('titulo')->nullable();
            $table->string('nombre_cliente')->nullable();
            $table->string('responsable')->nullable();
            $table->string('sustituto_responsable')->nullable();
            $table->string('custoteam_proyecto')->nullable();
            $table->string('custocoor_jefeproyecto')->nullable();
            $table->text('descripcion')->nullable();
            $table->string('core_product')->nullable();
            $table->string('anexos')->nullable();
            $table->string('sustituye')->nullable();
            $table->string('sustitucion')->nullable();
            $table->decimal('consumo', 10, 2)->nullable();
            $table->string('consumo_unidad')->nullable();
            $table->string('consumo_tipo')->nullable();
            $table->decimal('precio_deseado', 10, 2)->nullable();
            $table->dateTime('fecha_deseada')->nullable(); 
            $table->dateTime('fecha_decision')->nullable();
            $table->dateTime('fecha_comienzo')->nullable();
            $table->dateTime('fecha_envio')->nullable();
            $table->string('requisitos')->nullable();
            $table->string('reciclaje')->nullable();
            $table->integer('secuencia')->default(1);
            $table->boolean('rechazado')->default(false);
            $table->string('motivo_rechazo')->nullable();
            $table->boolean('aprobado')->default(false);
            $table->text('notas')->nullable();

            $table->primary(['numero', 'revision']);
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hdps');
    }
};
