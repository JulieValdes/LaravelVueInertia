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
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 60);
            $table->string('alias', 50)->nullable();
            $table->string('email', 100);
            $table->string('rfc', 18)->nullable();
            $table->string('numero_ext', 15)->nullable();
            $table->string('numero_int', 15)->nullable();
            //$table->string('REGIMEN FISCAL', 100); esto es un catalogo(seeder)?, hay que preguntar
            $table->string('direccion', 100)->nullable();
            $table->enum('tipo', ['Cliente', 'Proveedor']);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personas');
    }
};

