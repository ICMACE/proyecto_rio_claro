@extends('layouts.app')

@section('title','Proveedores')

@section('content')

<div class="d-flex justify-content-between mb-3">

    <h2>

        Proveedores

    </h2>

    <a href="{{ route('proveedores.create') }}"
       class="btn btn-primary">

        Nuevo Proveedor

    </a>

</div>

@if(session('success'))

<div class="alert alert-success">

    {{ session('success') }}

</div>

@endif

<div class="card">

    <div class="card-body">

        <table class="table table-bordered">

            <thead>

                <tr>

                    <th>Código</th>

                    <th>Nombre</th>

                    <th>RFC</th>

                    <th>Teléfono</th>

                    <th>Correo</th>

                </tr>

            </thead>

            <tbody>

                @forelse($proveedores as $proveedor)

                <tr>

                    <td>
                        {{ $proveedor->codigo }}
                    </td>

                    <td>
                        {{ $proveedor->nombre }}
                    </td>

                    <td>
                        {{ $proveedor->rfc }}
                    </td>

                    <td>
                        {{ $proveedor->telefono }}
                    </td>

                    <td>
                        {{ $proveedor->correo }}
                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="5">

                        Sin registros

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

        {{ $proveedores->links() }}

    </div>

</div>

@endsection