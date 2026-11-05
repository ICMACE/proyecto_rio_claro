@extends('layouts.app')

@section('title','Nuevo Proveedor')

@section('content')

<div class="card">

    <div class="card-header">

        Nuevo Proveedor

    </div>

    <div class="card-body">

        <form method="POST"
              action="{{ route('proveedores.store') }}">

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

                <label>RFC</label>

                <input type="text"
                       name="rfc"
                       class="form-control">

            </div>

            <div class="form-group">

                <label>Teléfono</label>

                <input type="text"
                       name="telefono"
                       class="form-control">

            </div>

            <div class="form-group">

                <label>Correo</label>

                <input type="email"
                       name="correo"
                       class="form-control">

            </div>

            <div class="form-group">

                <label>Contacto</label>

                <input type="text"
                       name="contacto"
                       class="form-control">

            </div>

            <button class="btn btn-success">

                Guardar

            </button>

        </form>

    </div>

</div>

@endsection