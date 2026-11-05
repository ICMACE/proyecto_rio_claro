@extends('layouts.app')

@section('title','Facturas')

@section('content')

<div class="d-flex justify-content-between mb-3">

    <h2>Facturas</h2>

    <a href="{{ route('facturas.create') }}"
       class="btn btn-primary">

        Nueva Factura

    </a>

</div>

<div class="card">

    <div class="card-body">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif
        <table class="table table-striped">

            <thead>

                <tr>

                    <th>Folio</th>
                    <th>Proveedor</th>
                    <th>Fecha</th>
                    <th>Total</th>
                    <th>Estado</th>

                </tr>

            </thead>

            <tbody>

                @forelse($facturas as $factura)

                <tr>

                    <td>
                        {{ $factura->folio }}
                    </td>

                    <td>
                        {{ $factura->proveedor?->nombre }}
                    </td>

                    <td>
                        {{ $factura->fecha_factura }}
                    </td>

                    <td>
                        ${{ number_format($factura->total,2) }}
                    </td>

                    <td>

                        <span class="badge badge-success">

                            {{ $factura->estado }}

                        </span>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="5">

                        Sin facturas

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection