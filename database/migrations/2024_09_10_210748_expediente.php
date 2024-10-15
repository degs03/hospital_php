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
        //
        Schema::create('expedientes',function(Blueprint $table){
            $table->id();
            $table->string('numero');
            $table->string('anho');
            $table->string('descripcion');
            $table->string('estado');
            $table->integer('hospital');
            $table->string('doctor');
            $table->unsignedBigInteger('id_pacientes');
            $table->foreign('id_pacientes')->references('id')->on('pacientes');
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
