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
        Schema::create('facturas', function (Blueprint $table) {

            $table->id();

            $table->string('folio')->nullable();

            $table->unsignedBigInteger('proveedor_id')
                ->nullable();

            $table->date('fecha_factura')
                ->nullable();

            $table->decimal('subtotal', 12, 2)
                ->default(0);

            $table->decimal('iva', 12, 2)
                ->default(0);

            $table->decimal('total', 12, 2)
                ->default(0);

            $table->string('archivo')
                ->nullable();

            $table->string('estado')
                ->default('Pendiente');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facturas');
    }
};
