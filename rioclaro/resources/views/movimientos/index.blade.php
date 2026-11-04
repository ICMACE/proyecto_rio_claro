@extends('layouts.app')

@section('title','Movimientos')

@section('content')

<div class="d-flex justify-content-between mb-3">

    <h2>Movimientos de Inventario</h2>

    <a href="{{ route('movimientos.create') }}"
       class="btn btn-primary">

        Nuevo Movimiento

    </a>

</div>

<div class="card">

    <div class="card-body">

        <table class="table table-bordered">

            <thead>

                <tr>

                    <th>Fecha</th>

                    <th>Producto</th>

                    <th>Tipo</th>

                    <th>Cantidad</th>

                    <th>Usuario</th>

                </tr>

            </thead>

            <tbody>

            @foreach($movimientos as $movimiento)

                <tr>

                    <td>

                        {{
                            $movimiento->created_at
                        }}

                    </td>

                    <td>

                        {{
                            $movimiento->producto->nombre
                        }}

                    </td>

                    <td>

                        {{ $movimiento->tipo }}

                    </td>

                    <td>

                        {{ $movimiento->cantidad }}

                    </td>

                    <td>

                        {{
                            $movimiento->usuario?->name
                        }}

                    </td>

                </tr>

            @endforeach

            </tbody>

        </table>

        {{ $movimientos->links() }}

    </div>

</div>

@endsection