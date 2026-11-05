<?php

namespace App\Services\Tools;

use App\Models\Producto;
use App\Services\ResponseFormatterService;

class InventoryTool
{
    public function __construct(
        private ResponseFormatterService $formatter
    ) {}

    public function stockBajo(): string
    {
        $productos =
            Producto::whereColumn(
                'stock_actual',
                '<=',
                'stock_minimo'
            )->get();

        return $this->formatter
            ->inventario(
                $productos
            );
    }
}