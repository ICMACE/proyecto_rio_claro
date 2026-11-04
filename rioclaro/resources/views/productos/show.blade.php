@extends('layouts.app')

@section('title', $producto->nombre)

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">

    <h2>

        {{ $producto->nombre }}

    </h2>

    <a href="{{ route('productos.index') }}"
       class="btn btn-secondary">

        Volver

    </a>

</div>

<div class="row">

    <!-- Información General -->

    <div class="col-md-4">

        <div class="card mb-3">

            <div class="card-header">

                Información General

            </div>

            <div class="card-body">

                <p>
                    <strong>Código:</strong>
                    {{ $producto->codigo }}
                </p>

                <p>
                    <strong>Nombre:</strong>
                    {{ $producto->nombre }}
                </p>

                <p>
                    <strong>Categoría:</strong>
                    {{ $producto->categoria }}
                </p>

                <p>
                    <strong>Unidad:</strong>
                    {{ $producto->unidad }}
                </p>

                <p>
                    <strong>Proveedor:</strong>

                    {{ $producto->proveedor?->nombre ?? 'Sin proveedor' }}

                </p>

            </div>

        </div>

    </div>

    <!-- Stock -->

    <div class="col-md-4">

        <div class="card mb-3">

            <div class="card-header">

                Inventario

            </div>

            <div class="card-body">

                <p>

                    <strong>Stock Actual:</strong>

                    @if(
                        $producto->stock_actual <=
                        $producto->stock_minimo
                    )

                        <span class="badge badge-danger">

                            {{ $producto->stock_actual }}

                        </span>

                    @else

                        <span class="badge badge-success">

                            {{ $producto->stock_actual }}

                        </span>

                    @endif

                </p>

                <p>

                    <strong>Stock Mínimo:</strong>

                    {{ $producto->stock_minimo }}

                </p>

                <p>

                    <strong>Stock Máximo:</strong>

                    {{ $producto->stock_maximo }}

                </p>

            </div>

        </div>

    </div>

    <!-- Resumen -->

    <div class="col-md-4">

        <div class="card mb-3">

            <div class="card-header">

                Resumen

            </div>

            <div class="card-body">

                <p>

                    <strong>Total Movimientos:</strong>

                    {{ $producto->movimientos->count() }}

                </p>

                <p>

                    <strong>Última Actualización:</strong>

                    {{ $producto->updated_at }}

                </p>

            </div>

        </div>

    </div>

</div>

<!-- Historial -->

<div class="card">

    <div class="card-header">

        Historial de Movimientos

    </div>

    <div class="card-body">

        @if($producto->movimientos->count())

            <table class="table table-bordered table-sm">

                <thead>

                    <tr>

                        <th>Fecha</th>

                        <th>Tipo</th>

                        <th>Cantidad</th>

                        <th>Usuario</th>

                        <th>Observaciones</th>

                    </tr>

                </thead>

                <tbody>

                    @foreach(
                        $producto->movimientos
                            ->sortByDesc('created_at')
                        as $movimiento
                    )

                    <tr>

                        <td>

                            {{ $movimiento->created_at }}

                        </td>

                        <td>

                            @switch($movimiento->tipo)

                                @case('ENTRADA')

                                    <span class="badge badge-success">

                                        Entrada

                                    </span>

                                @break

                                @case('SALIDA')

                                    <span class="badge badge-danger">

                                        Salida

                                    </span>

                                @break

                                @default

                                    <span class="badge badge-warning">

                                        Ajuste

                                    </span>

                            @endswitch

                        </td>

                        <td>

                            {{ $movimiento->cantidad }}

                        </td>

                        <td>

                            {{ $movimiento->usuario?->name }}

                        </td>

                        <td>

                            {{ $movimiento->observaciones }}

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        @else

            <div class="alert alert-info">

                No existen movimientos registrados
                para este producto.

            </div>

        @endif

    </div>

</div>

@endsection