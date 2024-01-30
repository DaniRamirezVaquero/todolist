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
        Schema::create('usuario', function (Blueprint $table) {

            $table->id('idUsu');
            $table->string('nombre', 100);
            $table->string('apellido', 100);
            $table->string('foto')->nullable();

            $table->string('email')->unique();
            $table->string('password');

            $table->timestamps();

            $table->timestamp('deleted_at')->nullable();

            // $table->timestamp('email_verified_at')->nullable();
            // $table->rememberToken(); Sirve para recordar la sesión del usuario, tipica casilla de "Recordar sesión"
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuario');
    }
};
