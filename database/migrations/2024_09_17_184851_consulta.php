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
        Schema::create('consultas',function(Blueprint $table){
            $table->id();
            $table->string('sintomas');
            $table->string('descripcion');
            $table->string('tipo_consulta');
            $table->string('fecha');
            $table->string('estado');
            $table->string('receta');
            $table->unsignedBigInteger('id_expediente');
            $table->foreign('id_expediente')->references('id')->on('expedientes');
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
