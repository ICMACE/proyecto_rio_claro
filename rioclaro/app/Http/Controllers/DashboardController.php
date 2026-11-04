<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\Factura;
use App\Models\MovimientoInventario;

class DashboardController extends Controller
{
    public function index()
    {
        return view(
            'dashboard',
            [

                'productos' =>
                    Producto::count(),

                'proveedores' =>
                    Proveedor::count(),

                'facturas' =>
                    Factura::count(),

                'stockBajo' =>
                    Producto::whereColumn(
                        'stock_actual',
                        '<=',
                        'stock_minimo'
                    )->count(),

                'comprasMes' =>
                    Factura::whereMonth(
                        'fecha_factura',
                        now()->month
                    )->sum('total'),

                'movimientos' =>
                    MovimientoInventario::with(
                        'producto'
                    )
                    ->latest()
                    ->take(10)
                    ->get()
            ]
        );
    }
}