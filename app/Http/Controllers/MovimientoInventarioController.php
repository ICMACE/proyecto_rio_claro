<?php

namespace App\Http\Controllers;

use App\Models\MovimientoInventario;
use Illuminate\Http\Request;
use App\Models\Producto;
use App\Services\AuditService;

class MovimientoInventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index()
{
    $movimientos =
        MovimientoInventario::with([
            'producto',
            'usuario'
        ])
        ->latest()
        ->paginate(20);

    return view(
        'movimientos.index',
        compact('movimientos')
    );
}

    /**
     * Show the form for creating a new resource.
     */
public function create()
{
    $productos =
        Producto::orderBy('nombre')
            ->get();

    return view(
        'movimientos.create',
        compact('productos')
    );
}

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    $request->validate([

        'producto_id' => 'required',

        'tipo' => 'required',

        'cantidad' => 'required|integer|min:1'
    ]);

    $producto = Producto::findOrFail(
        $request->producto_id
    );

    MovimientoInventario::create([

        'producto_id' =>
            $producto->id,

        'user_id' =>
            auth()->id(),

        'tipo' =>
            $request->tipo,

        'cantidad' =>
            $request->cantidad,

        'observaciones' =>
            $request->observaciones
    ]);

    switch ($request->tipo) {

        case 'ENTRADA':

            $producto->increment(
                'stock_actual',
                $request->cantidad
            );

        break;

        case 'SALIDA':

            $producto->decrement(
                'stock_actual',
                $request->cantidad
            );

        break;

        case 'AJUSTE':

            $producto->stock_actual =
                $request->cantidad;

            $producto->save();

        break;
    }

    AuditService::registrar(

        modulo : 'Inventario',

        accion : 'MOVIMIENTO_REGISTRADO',

        entidad : 'Producto',

        entidadId : $producto->id,

        detalle : [

            'tipo' => $request->tipo,

            'cantidad' => $request->cantidad,

            'producto' => $producto->nombre
        ]
    );

    return redirect()
        ->route('movimientos.index')
        ->with(
            'success',
            'Movimiento registrado.'
        );
}

    /**
     * Display the specified resource.
     */
    public function show(MovimientoInventario $movimientoInventario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MovimientoInventario $movimientoInventario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MovimientoInventario $movimientoInventario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MovimientoInventario $movimientoInventario)
    {
        //
    }
}
