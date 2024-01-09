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
        Schema::create('servicios', function (Blueprint $table) {
            $table->id();
            $table->string('clave_ext', 60)->nullable();
            $table->string('nombre', 60);
            $table->string('codigo', 60)->nullable();
            $table->string('codigo_sat', 60);
            $table->string('unidad', 60)->nullable();
            $table->string('unidad_sat', 60);
            $table->boolean('almacenable', 100)->default(false);
            $table->string('precio', 30);
            $table->string('costo', 30)->nullable();
            $table->enum('tipo', ['Servicio', 'Producto']);
            $table->string('iva', 10)->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicios');
    }
};
