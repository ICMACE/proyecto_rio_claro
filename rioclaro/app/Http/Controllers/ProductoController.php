<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use App\Models\Proveedor;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index()
{
    $productos = Producto::with(
        'proveedor'
    )
    ->orderBy('nombre')
    ->paginate(10);

    return view(
        'productos.index',
        compact('productos')
    );
}

    /**
     * Show the form for creating a new resource.
     */
public function create()
{
    $proveedores = Proveedor::orderBy(
        'nombre'
    )->get();

    return view(
        'productos.create',
        compact('proveedores')
    );
}

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    $request->validate([

        'codigo' => 'required|unique:productos',

        'nombre' => 'required',

        'proveedor_id' => 'nullable|exists:proveedores,id'

    ]);

    Producto::create(
        $request->all()
    );

    return redirect()
        ->route('productos.index')
        ->with(
            'success',
            'Producto creado correctamente.'
        );
}

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        //
    }
}
