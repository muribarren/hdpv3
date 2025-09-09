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
        Schema::create('produccions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();


            $table->unsignedBigInteger('idhdp');
            $table->integer('revision');
            $table->boolean('inversion_necesaria')->default(false);
            $table->string('importe_inversion')->nullable();
            $table->string('material')->nullable();
            $table->string('acabado')->nullable();
            $table->string('peso_pieza')->nullable();
            $table->string('anexos')->nullable();
            $table->string('igual_a_estructura')->nullable();
            $table->string('inversion_troquel')->nullable();
            $table->date('plazo')->nullable();
            $table->text('notas')->nullable();
            $table->string('estructura')->nullable();





        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produccions');
    }
};
