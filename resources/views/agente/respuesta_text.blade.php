@extends('layouts.app')

@section('title','Respuesta IA')

@section('content')

<div class="card">

    <div class="card-header">

        Respuesta

    </div>

    <div class="card-body">

        <h4>

            {{ $respuesta }}

        </h4>

        <a href="{{ route('agente.index') }}"
           class="btn btn-primary">

            Volver

        </a>

    </div>

</div>

@endsection