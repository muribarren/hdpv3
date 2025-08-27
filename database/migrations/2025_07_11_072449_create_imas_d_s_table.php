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
        Schema::create('imas_d_s', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            
            $table->unsignedBigInteger('idhdp');
            $table->integer('revision');
            $table->string('clase')->nullable();
            $table->boolean('ensayo_hecho')->default(false);
            $table->boolean('plano_provisional')->nullable();
            $table->string('anexos')->nullable();
            $table->boolean('realizado_prototipo')->default(false);
            $table->date('enviado_a_cliente')->nullable;
            $table->text('notas')->nullable();
            $table->text('paso_siguiente')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imas_d_s');
    }
};
