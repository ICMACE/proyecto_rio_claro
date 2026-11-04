@extends('layouts.app')

@section('title','Subir Factura')

@section('content')

<div class="card">

    <div class="card-header">

        Cargar Factura

    </div>

    <div class="card-body">

        <form
            method="POST"
            action="{{ route('facturas.store') }}"
            enctype="multipart/form-data">

            @csrf

            <div class="form-group">

                <label>

                    Archivo PDF o Imagen

                </label>

                <input
                    type="file"
                    name="archivo"
                    class="form-control">

            </div>

            <button
                class="btn btn-primary">

                Procesar con IA

            </button>

        </form>

    </div>

</div>

@endsection