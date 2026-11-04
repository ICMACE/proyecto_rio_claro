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
        Schema::create('productos', function (Blueprint $table) {

            $table->id();

            $table->string('codigo')->unique();

            $table->string('nombre');

            $table->string('categoria');

            $table->string('unidad');

            $table->integer('stock_actual');

            $table->integer('stock_minimo');

            $table->integer('stock_maximo');

            $table->unsignedBigInteger('proveedor_id')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
