@extends('layouts.app')

@section('title','Productos')

@section('content')

<div class="d-flex justify-content-between mb-3">

    <h2>Productos</h2>

    <a href="{{ route('productos.create') }}"
       class="btn btn-primary">

        Nuevo Producto

    </a>

</div>

@if(session('success'))

<div class="alert alert-success">

    {{ session('success') }}

</div>

@endif

<div class="card">

    <div class="card-body">

        <table class="table table-striped">

            <thead>

                <tr>

                    <th>Código</th>

                    <th>Producto</th>

                    <th>Categoría</th>

                    <th>Stock</th>

                    <th>Proveedor</th>
                    <th>Acciones</th>

                </tr>

            </thead>

            <tbody>

            @forelse($productos as $producto)

                <tr>

                    <td>
                        {{ $producto->codigo }}
                    </td>

                    <td>
                        {{ $producto->nombre }}
                    </td>

                    <td>
                        {{ $producto->categoria }}
                    </td>

                    <td>

                        @if(
                            $producto->stock_actual <=
                            $producto->stock_minimo
                        )

                            <span
                              class="badge badge-danger">

                                {{ $producto->stock_actual }}

                            </span>

                        @else

                            <span
                              class="badge badge-success">

                                {{ $producto->stock_actual }}

                            </span>

                        @endif

                    </td>

                    <td>

                        {{
                            $producto->proveedor?->nombre
                        }}

                    </td>
                    <td>
                        <a
                        href="{{ route(
                            'productos.show',
                            $producto
                        ) }}"
                        class="btn btn-sm btn-info">

                        Ver

                        </a>
                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="5">

                        Sin productos registrados

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

        {{ $productos->links() }}

    </div>

</div>

@endsection
