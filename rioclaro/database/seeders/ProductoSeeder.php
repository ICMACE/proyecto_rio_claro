<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Producto;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Producto::create([
            'codigo' => 'P0001',
            'nombre' => 'Cloro Industrial 20L',
            'categoria' => 'Desinfección',
            'unidad' => 'Pieza',
            'stock_actual' => 1250,
            'stock_minimo' => 100,
            'stock_maximo' => 2000,
            'proveedor_id' => 1
        ]);

        Producto::create([
            'codigo' => 'P0002',
            'nombre' => 'Detergente Industrial',
            'categoria' => 'Limpieza',
            'unidad' => 'Pieza',
            'stock_actual' => 320,
            'stock_minimo' => 50,
            'stock_maximo' => 800,
            'proveedor_id' => 2
        ]);
    }
}
