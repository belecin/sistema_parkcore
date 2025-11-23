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
        Schema::create('tarifas', function (Blueprint $table) {
            $table->id();

            $table->enum('nombre',['regular','nocturna','fin_de_semana','feriados']);
            $table->enum('tipo',['hora','dia','noche']);
            $table->decimal('costo',10,2);
            $table->integer('cantidad');
            $table->integer('minutos_de_gracia');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarifas');
    }
};
