@extends('layouts.app')

@section('title', 'Validar Factura')

@section('content')

<div class="row">

    <div class="col-md-8 offset-md-2">

        <div class="card">

            <div class="card-header">

                Validación de Factura Extraída por IA

            </div>

            <div class="card-body">

                <form method="POST" action="{{ route('facturas.confirmar') }}">
                    @csrf
                    <input type="hidden" name="archivo" value="{{ $archivo }}">
                    <div class="form-group">

                        <label>Proveedor</label>

                        <input
                            type="text"
                            name="proveedor"
                            class="form-control"
                            value="{{ $factura['proveedor'] }}">

                    </div>


                    <div class="form-group">

                        <label>Folio</label>

                        <input
                            type="text"
                            name="folio"
                            class="form-control"
                            value="{{ $factura['folio'] }}"
                            >

                    </div>

                    <div class="form-group">

                        <label>Fecha Factura</label>

                        <input
                            type="date"
                            name="fecha_factura"
                            class="form-control"
                            value="{{ $factura['fecha_factura'] }}"
                            >

                    </div>

                    <div class="form-group">

                        <label>Subtotal</label>

                        <input
                            type="text"
                            name="subtotal"
                            class="form-control"
                            value="{{ $factura['subtotal'] }}"
                            >

                    </div>

                    <div class="form-group">

                        <label>IVA</label>

                        <input
                            type="text"
                            name="iva"
                            class="form-control"
                            value="{{ $factura['iva'] }}"
                            >

                    </div>

                    <div class="form-group">

                        <label>Total</label>

                        <input
                            type="text"
                            name="total"
                            class="form-control font-weight-bold"
                            value="{{ $factura['total'] }}"
                            >

                    </div>

                    <hr>

                    <div class="alert alert-info">

                        Información obtenida automáticamente por Azure Document Intelligence.

                    </div>
                    <button class="btn btn-success">
                        Guardar Factura
                    </button>
                    </form>
                </form>

            </div>

        </div>

    </div>

</div>

@endsection