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
        Schema::create('tarea_etiqueta', function (Blueprint $table) {

            $table->id('idTE');
            $table->unsignedBigInteger('idTar');
            $table->unsignedBigInteger('idEti');

            $table->foreign('idTar')->references('idTar')->on('tarea')
                ->onDelete('cascade'); // Si se borra una tarea, se borran sus etiquetas

            $table->foreign('idEti')->references('idEti')->on('etiqueta')
                ->onDelete('cascade'); // Si se borra una etiqueta, se borran sus tareas
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarea_etiqueta');
    }
};
