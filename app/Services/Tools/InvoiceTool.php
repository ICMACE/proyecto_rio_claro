<?php

namespace App\Services\Tools;

use App\Models\Factura;
use App\Services\ResponseFormatterService;

class InvoiceTool
{
    public function __construct(
        private ResponseFormatterService $formatter
    ){}

    public function resumen(): string
    {
        $cantidad = Factura::count();

        $totalMes =
            Factura::whereMonth(
                'fecha_factura',
                now()->month
            )
            ->sum('total');

        return $this->formatter
            ->facturas(
                $cantidad,
                $totalMes
            );
    }
}