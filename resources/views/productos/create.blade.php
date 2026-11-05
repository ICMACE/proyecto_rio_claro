@extends('layouts.app')

@section('title','Nuevo Producto')

@section('content')

<div class="card">

    <div class="card-header">

        Nuevo Producto

    </div>

    <div class="card-body">

        <form method="POST"
              action="{{ route('productos.store') }}">

            @csrf

            <div class="form-group">

                <label>Código</label>

                <input type="text"
                       name="codigo"
                       class="form-control">

            </div>

            <div class="form-group">

                <label>Nombre</label>

                <input type="text"
                       name="nombre"
                       class="form-control">

            </div>

            <div class="form-group">

                <label>Categoría</label>

                <input type="text"
                       name="categoria"
                       class="form-control">

            </div>

            <div class="form-group">

                <label>Unidad</label>

                <input type="text"
                       name="unidad"
                       class="form-control">

            </div>

            <div class="form-group">

                <label>Stock Actual</label>

                <input type="number"
                       name="stock_actual"
                       class="form-control">

            </div>

            <div class="form-group">

                <label>Stock Mínimo</label>

                <input type="number"
                       name="stock_minimo"
                       class="form-control">

            </div>

            <div class="form-group">

                <label>Stock Máximo</label>

                <input type="number"
                       name="stock_maximo"
                       class="form-control">

            </div>

            <div class="form-group">

                <label>Proveedor</label>

                <select
                    name="proveedor_id"
                    class="form-control">

                    <option value="">

                        Seleccione

                    </option>

                    @foreach(
                        $proveedores as $proveedor
                    )

                    <option
                      value="{{ $proveedor->id }}">

                        {{ $proveedor->nombre }}

                    </option>

                    @endforeach

                </select>

            </div>

            <button
                class="btn btn-success">

                Guardar

            </button>

        </form>

    </div>

</div>

@endsection