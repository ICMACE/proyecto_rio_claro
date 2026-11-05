<?php

namespace App\Services;

use Illuminate\Support\Collection;
use App\Models\MovimientoInventario;

class ResponseFormatterService
{
    public function inventario(
        Collection $productos
    ): string {

        if ($productos->isEmpty()) {

            return
                'Actualmente no existen productos con stock bajo.';
        }

        $respuesta =
            "Actualmente existen "
            . $productos->count()
            . " productos que requieren atención por nivel de inventario.\n\n";

        foreach ($productos as $producto) {

            $respuesta .=

                "• {$producto->nombre}\n"

                ."Stock actual: {$producto->stock_actual}\n"

                ."Stock mínimo: {$producto->stock_minimo}\n\n";
        }

        $respuesta .=
            "Se recomienda iniciar un proceso de reabastecimiento.";

        return $respuesta;
    }

    public function facturas(
        int $cantidad,
        float $totalMes
    ): string {

        return

            "Actualmente existen {$cantidad} facturas registradas.\n\n"

            ."El monto acumulado de compras del mes es de $"

            .number_format($totalMes, 2)

            ." MXN.";
    }

    public function proveedores(
        int $cantidad
    ): string {

        return

            "Actualmente existen "
            .$cantidad
            ." proveedores registrados en el sistema.";
    }

    public function movimiento(
        ?MovimientoInventario $movimiento
    ): string {

        if (!$movimiento) {

            return
                "No existen movimientos registrados.";
        }

        return

            "Último movimiento registrado:\n\n"

            ."Tipo: {$movimiento->tipo}\n"

            ."Producto: {$movimiento->producto?->nombre}\n"

            ."Cantidad: {$movimiento->cantidad}\n"

            ."Fecha: {$movimiento->created_at->format('d/m/Y H:i')}";
    }

    public function desconocido(): string
    {
        return
            "No encontré suficiente información para responder tu consulta. Intenta reformular la pregunta.";
    }
}