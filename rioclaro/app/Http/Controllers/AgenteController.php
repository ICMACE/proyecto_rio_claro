<?php

namespace App\Http\Controllers;

use App\Services\AuditService;
use Illuminate\Http\Request;
use App\Services\AzureOpenAIService;
use App\Services\Tools\InventoryTool;
use App\Services\Tools\InvoiceTool;
use App\Services\Tools\SupplierTool;
use App\Services\Tools\MovementTool;
use App\Services\Tools\PolicyTool;

class AgenteController extends Controller
{
    public function __construct(

        private InventoryTool $inventoryTool,

        private InvoiceTool $invoiceTool,

        private SupplierTool $supplierTool,

        private MovementTool $movementTool,

        private PolicyTool $policyTool

    ){}
    public function index()
    {
        return view('agente.index');
    }
    public function preguntar(
        Request $request,
        AzureOpenAIService $openAI
    )
    {
        $tool = $openAI->ask(
            $request->pregunta
        );
        $tool = strtolower(
            trim(
                $openAI->ask(
                    $request->pregunta
                )
            )
        );
        logger()->info(
            'Tool detectada',
            [
                'pregunta' => $request->pregunta,
                'tool' => $tool
            ]
        );
        
        /*
        switch ($intent) {

            case 'inventario':

                $productos =
                    Producto::whereColumn(
                        'stock_actual',
                        '<=',
                        'stock_minimo'
                    )->get();

                if($productos->isEmpty()){

                    $respuesta =
                        'Actualmente no existen productos con stock bajo.';

                }else{

                    $respuesta =
                        "Productos con stock bajo:\n\n";

                    foreach($productos as $producto){

                        $respuesta .=

                            "• {$producto->nombre}"

                            ." (Stock: {$producto->stock_actual}"

                            .", Mínimo: {$producto->stock_minimo})\n";
                    }
                }

            break;
            case 'stock_bajo':

                $productos = Producto::whereColumn(
                    'stock_actual',
                    '<=',
                    'stock_minimo'
                )->get();

                if($productos->isEmpty()){

                    $respuesta =
                        'Actualmente no existen productos con stock bajo.';

                }else{

                    $respuesta =
                        "Productos con stock bajo:\n\n";

                    foreach($productos as $producto){

                        $respuesta .=
                            "• {$producto->nombre} "
                            . "(Stock: {$producto->stock_actual}, "
                            . "Mínimo: {$producto->stock_minimo})\n";
                    }
                }

            break;

            case 'facturas':

                $cantidad = Factura::count();

                $respuesta =
                    "Actualmente existen {$cantidad} facturas registradas.";

            break;

            case 'movimientos':

                    $ultimo =
                        MovimientoInventario::with(
                            'producto'
                        )
                        ->latest()
                        ->first();

                    if($ultimo){

                        $respuesta =
                            "Último movimiento:\n\n";

                        $respuesta .=

                            "{$ultimo->tipo} de "

                            .$ultimo->cantidad

                            ." unidades del producto "

                            .$ultimo->producto?->nombre;
                    }
                    else{

                        $respuesta =
                            "No existen movimientos registrados.";
                    }

                break;

            case 'proveedores':

                $cantidad =
                    Proveedor::count();

                $respuesta =
                    "Actualmente existen {$cantidad} proveedores registrados.";

            break;

            default:

                $respuesta =
                    'No encontré una intención válida para responder tu consulta.';
        }*/
        switch($tool){

            case 'inventario':

                $respuesta =
                    $this->inventoryTool
                        ->stockBajo();

            break;

            case 'facturas':

                $respuesta =
                    $this->invoiceTool
                        ->resumen();

            break;

            case 'proveedores':

                $respuesta =
                    $this->supplierTool
                        ->resumen();

            break;

            case 'movimientos':

                $respuesta =
                    $this->movementTool
                        ->ultimo();

            break;

            case 'politicas':

                $respuesta =
                    $this->policyTool
                        ->buscar(
                            $request->pregunta
                        );

            break;

            default:

                $respuesta =
                    'No encontré suficiente información para responder la consulta.';
        }

        AuditService::registrar(

            modulo: 'IA',

            accion: 'CONSULTA_IA',

            detalle: [

                'pregunta' =>
                    $request->pregunta,

                'tool' =>
                    $tool,

                'respuesta' =>
                    $respuesta
            ]
        );

        return view(
            'agente.respuesta',
            compact(
                'respuesta'
            )
        );
    }
    public function voz()
    {
        return view(
            'agente.voz'
        );
    }
    public function preguntarApi(
        Request $request,
        AzureOpenAIService $openAI
    )
    {
        $tool = strtolower(
            trim(
                $openAI->ask(
                    $request->pregunta
                )
            )
        );

        switch($tool){

            case 'inventario':

                $respuesta =
                    $this->inventoryTool
                        ->stockBajo();

            break;

            case 'facturas':

                $respuesta =
                    $this->invoiceTool
                        ->resumen();

            break;

            case 'proveedores':

                $respuesta =
                    $this->supplierTool
                        ->resumen();

            break;

            case 'movimientos':

                $respuesta =
                    $this->movementTool
                        ->ultimo();

            break;

            case 'politicas':

                $respuesta =
                    $this->policyTool
                        ->buscar(
                            $request->pregunta
                        );

            break;

            default:

                $respuesta =
                    'No encontré suficiente información para responder la consulta.';
        }

        return response()->json([

            'respuesta' =>
                $respuesta

        ]);
    }
}
