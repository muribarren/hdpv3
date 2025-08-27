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
        Schema::create('calidads', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('idhdp');
            $table->integer('revision');
            $table->dateTime('revision_serie_fecha')->nullable();
            $table->text('distribucion_copias')->nullable();
            $table->text('notas')->nullable();
            $table->string('anexos')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calidads');
    }
};
