<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('imc_calculations', function (Blueprint $table) {
            $table->id();
            $table->decimal('height', 5, 2); // Altura em metros
            $table->decimal('weight', 5, 2); // Peso em kg
            $table->decimal('bmi', 5, 2);    // IMC calculado
            $table->timestamps();
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
