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
        Schema::create('imas_d2_s', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('idhdp');
            $table->integer('revision');
            $table->string('plan_distribucion')->nullable();
            $table->boolean('establecido_plano')->default(false);
            $table->boolean('revision_plano')->default(false);
            $table->dateTime('fecha_distribucion')->nullable();
            $table->string('codigo_comercial')->nullable();
            $table->text('semielaborados')->nullable();
            $table->text('notas')->nullable();
            $table->text('anexos')->nullable();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imas_d2_s');
    }
};
