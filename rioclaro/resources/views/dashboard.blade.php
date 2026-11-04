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

@endsection