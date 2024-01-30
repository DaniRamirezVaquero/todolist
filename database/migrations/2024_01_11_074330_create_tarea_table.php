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
        Schema::create('tarea', function (Blueprint $table) {

            // Atributos de la tabla
            $table->id('idTar'); // Crea la clave primaria con autoincremento, nombre idTar, será de tipo bigInteger
            $table->unsignedBigInteger('idUsu'); // Clave foránea, será de tipo bigInteger

            $table->text('texto');
            $table->boolean('completa')->default(false);
            $table->date('fecha');

            // Crea los campos created_at y updated_at
            // created_at: fecha de creación del registro
            // updated_at: fecha de la última actualización del registro
            // Se actualizan automáticamente
            $table->timestamps();

            // Claves foráneas
            $table->foreign('idUsu')->references('idUsu')->on('usuario')
                ->onDelete('cascade'); // Si se borra un usuario, se borran sus tareas
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarea');
    }
};
