<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Proveedor;

class ProveedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Proveedor::create([
            'codigo' => 'PR001',
            'nombre' => 'Limpieza y Desinfección Total',
            'rfc' => 'LDT010101AAA',
            'telefono' => '7221234567',
            'correo' => 'contacto@limpiezatotal.com',
            'contacto' => 'Ventas'
        ]);

        Proveedor::create([
            'codigo' => 'PR002',
            'nombre' => 'Químicos del Bajío',
            'rfc' => 'QDB010101BBB',
            'telefono' => '4771234567',
            'correo' => 'ventas@quimicosbajio.com',
            'contacto' => 'Comercial'
        ]);
    }
}
