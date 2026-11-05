@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="row">

    <div class="col-md-3">

        <div class="card card-dashboard">

            <div class="card-body">

                <h6>Productos</h6>

                <div class="counter">

                    {{ $productos }}

                </div>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="card card-dashboard">

            <div class="card-body">

                <h6>Proveedores</h6>

                <div class="counter">

                    {{ $proveedores }}

                </div>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="card card-dashboard">

            <div class="card-body">

                <h6>Facturas</h6>

                <div class="counter">

                    {{ $facturas }}

                </div>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="card card-dashboard">

            <div class="card-body">

                <h6>Stock Bajo</h6>

                <div class="counter text-danger">

                    {{ $stockBajo }}

                </div>

            </div>

        </div>

    </div>

</div>

<div class="row mt-4">

    <div class="col-md-8">

        <div class="card card-dashboard">

            <div class="card-header">

                Bienvenido a Río Claro

            </div>

            <div class="card-body">

                Sistema de gestión de:

                <ul>
                    <li>Inventarios</li>
                    <li>Proveedores</li>
                    <li>Facturación</li>
                    <li>Inteligencia Artificial</li>
                </ul>

            </div>

        </div>

    </div>

    <div class="col-md-4">

        <div class="card card-dashboard">

            <div class="card-header">

                Estado del Sistema

            </div>

            <div class="card-body">

                ✅ Azure AI Search<br>
                ✅ Azure AI Foundry<br>
                ✅ Azure Document Intelligence<br>
                ✅ Agente Río Claro

            </div>

        </div>

    </div>

</div>
<div class="row mt-4">
    <div class="col-md-12">
        <div class="card card-dashboard mt-4">

            <div class="card-header">

                Movimientos Recientes

            </div>

            <div class="card-body">

                <table class="table table-sm">

                    <thead>

                        <tr>

                            <th>Fecha</th>

                            <th>Producto</th>

                            <th>Tipo</th>

                            <th>Cantidad</th>

                        </tr>

                    </thead>

                    <tbody>

                        @foreach($movimientos as $movimiento)

                        <tr>

                            <td>

                                {{
                                    $movimiento
                                        ->created_at
                                        ->format('d/m/Y H:i')
                                }}

                            </td>

                            <td>

                                {{
                                    $movimiento
                                        ->producto
                                        ->nombre
                                }}

                            </td>

                            <td>

                                @if($movimiento->tipo == 'ENTRADA')

                                    <span class="badge badge-success">

                                        Entrada

                                    </span>

                                @elseif($movimiento->tipo == 'SALIDA')

                                    <span class="badge badge-danger">

                                        Salida

                                    </span>

                                @else

                                    <span class="badge badge-warning">

                                        Ajuste

                                    </span>

                                @endif

                            </td>

                            <td>

                                {{ $movimiento->cantidad }}

                            </td>

                        </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>
    </div>
</div>
@endsection