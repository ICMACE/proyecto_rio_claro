@extends('layouts.app')

@section('title','Nuevo Movimiento')

@section('content')

<div class="card">

    <div class="card-header">

        Movimiento de Inventario

    </div>

    <div class="card-body">

        <form method="POST"
              action="{{ route('movimientos.store') }}">

            @csrf

            <div class="form-group">

                <label>Producto</label>

                <select
                    name="producto_id"
                    class="form-control">

                    @foreach($productos as $producto)

                        <option
                            value="{{ $producto->id }}">

                            {{ $producto->nombre }}

                        </option>

                    @endforeach

                </select>

            </div>

            <div class="form-group">

                <label>Tipo</label>

                <select
                    name="tipo"
                    class="form-control">

                    <option value="ENTRADA">
                        Entrada
                    </option>

                    <option value="SALIDA">
                        Salida
                    </option>

                    <option value="AJUSTE">
                        Ajuste
                    </option>

                </select>

            </div>

            <div class="form-group">

                <label>Cantidad</label>

                <input
                    type="number"
                    name="cantidad"
                    class="form-control">

            </div>

            <div class="form-group">

                <label>Observaciones</label>

                <textarea
                    name="observaciones"
                    class="form-control"></textarea>

            </div>

            <button
                class="btn btn-success">

                Guardar Movimiento

            </button>

        </form>

    </div>

</div>

@endsection