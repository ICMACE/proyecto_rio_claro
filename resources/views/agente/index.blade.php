@extends('layouts.app')

@section('title','Asistente IA')

@section('content')

<div class="row">

    <div class="col-md-10 offset-md-1">

        <div class="card">

            <div class="card-header">

                Asistente Río Claro

            </div>

            <div class="card-body">

                <form method="POST"
                      action="{{ route('agente.preguntar') }}">

                    @csrf

                    <div class="form-group">

                        <label>

                            Pregunta

                        </label>

                        <textarea
                            class="form-control"
                            name="pregunta"
                            rows="3"></textarea>

                    </div>

                    <button
                        class="btn btn-primary">

                        Preguntar

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection