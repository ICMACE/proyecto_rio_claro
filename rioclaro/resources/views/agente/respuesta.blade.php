@extends('layouts.app')

@section('title','Respuesta IA')

@section('content')

<div class="card">

    <div class="card-header">

        Respuesta

    </div>

    <div class="card-body">

        <pre class="mb-3" style="white-space: pre-wrap;">{{ $respuesta }}</pre>

        <a href="{{ route('agente.index') }}"
           class="btn btn-primary">

            Volver

        </a>

        <button
            type="button"
            class="btn btn-info"
            onclick="leerRespuesta()">

            🔊 Escuchar Respuesta

        </button>
        <button
            type="button"
            class="btn btn-danger"
            onclick="window.speechSynthesis.cancel()">

            ⏹ Detener voz

        </button>

    </div>

</div>

@endsection

@push('scripts')

<script>

function leerRespuesta()
{
    const texto = @json($respuesta);

    if(window.speechSynthesis.speaking){

        window.speechSynthesis.cancel();

    }

    const speech =
        new SpeechSynthesisUtterance(texto);

    speech.lang = 'es-MX';

    speech.rate = 1;

    speech.pitch = 1;

    window.speechSynthesis.speak(speech);
}

</script>

@endpush