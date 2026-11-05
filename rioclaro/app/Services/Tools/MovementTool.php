<?php

namespace App\Services\Tools;

use App\Models\MovimientoInventario;
use App\Services\ResponseFormatterService;

class MovementTool
{
    public function __construct(
        private ResponseFormatterService $formatter
    ){}

    public function ultimo(): string
    {
        return $this->formatter
            ->movimiento(

                MovimientoInventario::with(
                    'producto'
                )
                ->latest()
                ->first()

            );
    }
}