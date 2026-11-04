<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use Illuminate\Http\Request;
use App\Services\AzureDocumentIntelligenceService;
use App\Services\AuditService;
use App\Services\DocumentIntelligenceParser;
use App\Models\Proveedor;


class FacturaController extends Controller
{
private AzureDocumentIntelligenceService $docAI;

private DocumentIntelligenceParser $parser;

public function __construct(
    AzureDocumentIntelligenceService $docAI,
    DocumentIntelligenceParser $parser
)
{
    $this->docAI = $docAI;

    $this->parser = $parser;
}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view(
            'facturas.index',
            [
                'facturas' => Factura::all()
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(
            'facturas.create'
        );
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(
    Request $request
)
{
    $request->validate([

        'archivo' => 'required|file'
    ]);

    $path = $request
        ->file('archivo')
        ->store(
            'facturas',
            'public'
        );

    AuditService::registrar(

        modulo : 'Facturas',

        accion : 'FACTURA_CARGADA',

        detalle : [

            'archivo' => $path
        ]
    );

    $localFile = storage_path(
        'app/public/'.$path
    );

    $analysis =
        $this->docAI
            ->analyzeInvoice(
                $localFile
            );

    AuditService::registrar(

        modulo : 'Facturas',

        accion : 'ENVIO_AZURE_DOC_INTELLIGENCE',

        detalle : [

            'archivo' => $path
        ]
    );

    sleep(5);

    $result =
        $this->docAI
            ->getResult(
                $analysis['operation_location']
            );

    AuditService::registrar(

        modulo : 'Facturas',

        accion : 'RESPUESTA_AZURE_DOC_INTELLIGENCE',

        detalle : [

            'status' =>
                $result['status'] ?? null
        ]
    );

    $facturaExtraida =
        $this->parser
            ->parse($result);

    $proveedor =
        Proveedor::where(
            'nombre',
            'LIKE',
            '%'.$facturaExtraida['proveedor'].'%'
        )->first();

    return view(
        'facturas.validar',

        [

            'factura' =>
                $facturaExtraida,

            'proveedor' =>
                $proveedor,

            'archivo' =>
                $path
        ]
    );
}

    /**
     * Display the specified resource.
     */
    public function show(Factura $factura)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Factura $factura)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Factura $factura)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Factura $factura)
    {
        //
    }
    public function confirmar(Request $request)
    {
        //dd($request->all());
        $proveedor = Proveedor::firstOrCreate(
            [ 'nombre' =>$request->proveedor],
            ['codigo' =>'PR'.time()]
        );
        $duplicada =Factura::where('folio',$request->folio)
        ->where('proveedor_id',$proveedor->id)
        ->whereDate('fecha_factura',$request->fecha_factura)
        ->where('total',$request->total)->exists();
        if($duplicada){
            return redirect()->route('facturas.index')
                ->with('error','Factura duplicada.');
        }
        $factura = Factura::create([

            'folio' =>
                $request->folio,

            'proveedor_id' =>
                $proveedor->id,

            'fecha_factura' =>
                $request->fecha_factura,

            'subtotal' =>
                $request->subtotal,

            'iva' =>
                $request->iva,

            'total' =>
                $request->total,

            'archivo' =>
                $request->archivo,

            'estado' =>
                'Procesada'
        ]);
        AuditService::registrar(

            modulo : 'Facturas',

            accion : 'FACTURA_GUARDADA',

            entidad : 'Factura',

            entidadId : $factura->id,

            detalle : [

                'folio' => $factura->folio,

                'total' => $factura->total
            ]
        );
        return redirect()->route('facturas.index')->with('success','Factura registrada correctamente.');
        
    }  
}
