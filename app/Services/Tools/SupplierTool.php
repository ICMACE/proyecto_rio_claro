<?php

namespace App\Services\Tools;

use App\Models\Proveedor;
use App\Services\ResponseFormatterService;

class SupplierTool
{
    public function __construct(
        private ResponseFormatterService $formatter
    ){}

    public function resumen(): string
    {
        return $this->formatter
            ->proveedores(
                Proveedor::count()
            );
    }
}