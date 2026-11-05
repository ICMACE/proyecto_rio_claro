@extends('layouts.app')

@section('title','Asistente por Voz')

@section('content')

<div class="row">

    <div class="col-md-8 offset-md-2">

        <div class="card">

            <div class="card-header">

                Asistente de Voz Río Claro

            </div>

            <div class="card-body text-center">

                <h4 id="estado">

                    Presiona el botón y realiza tu pregunta

                </h4>

                <button
                    id="btnVoice"
                    class="btn btn-lg btn-primary mt-3">

                    🎤 Hablar

                </button>

                <hr>

                <h5>

                    Pregunta detectada

                </h5>

                <div
                    id="pregunta"
                    class="alert alert-light">

                    -
                </div>

                <h5>

                    Respuesta

                </h5>

                <div
                    id="respuesta"
                    class="alert alert-info">

                    -
                </div>
                <div class="card mb-3">

                    <div
                        id="chat"
                        class="card-body"
                        style="
                            min-height:400px;
                            max-height:500px;
                            overflow-y:auto;
                        ">

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection

@push('scripts')

<script>

const btn =
    document.getElementById(
        'btnVoice'
    );

const estado =
    document.getElementById(
        'estado'
    );

const preguntaDiv =
    document.getElementById(
        'pregunta'
    );

const respuestaDiv =
    document.getElementById(
        'respuesta'
    );

const recognition =
    new webkitSpeechRecognition();

recognition.lang = 'es-MX';

recognition.continuous = false;

recognition.interimResults = false;

btn.addEventListener(

    'click',

    () => {

        estado.innerHTML =
            'Escuchando...';

        recognition.start();
    }
);

recognition.onresult =
    async function(event)
{

    const pregunta =
        event.results[0][0]
        .transcript;
    agregarMensaje(
        'usuario',
        pregunta
    );

    preguntaDiv.innerHTML =
        pregunta;

    estado.innerHTML =
        'Consultando...';

    const response =
        await fetch(
            "{{ route('agente.api') }}",
            {

                method:'POST',

                headers: {

                    'Content-Type':
                        'application/json',

                    'X-CSRF-TOKEN':
                        '{{ csrf_token() }}'
                },

                body: JSON.stringify({

                    pregunta:
                        pregunta
                })
            }
        );

    const data =
        await response.json();
    agregarMensaje(
        'bot',
        data.respuesta
    );
    respuestaDiv.innerHTML =
        data.respuesta;

    estado.innerHTML =
        'Respuesta lista';

    const speech =
        new SpeechSynthesisUtterance(
            data.respuesta
        );

    speech.lang =
        'es-MX';

    speech.rate =
        1;

    window.speechSynthesis
        .speak(
            speech
        );
};
function agregarMensaje(
    tipo,
    texto
){

    let chat =
        document.getElementById(
            'chat'
        );

    let color =
        tipo === 'usuario'
            ? 'primary'
            : 'success';

    chat.innerHTML += `

        <div
            class="mb-3 text-${tipo === 'usuario'
                ? 'right'
                : 'left'}">

            <div
                class="alert alert-${color} d-inline-block">

                ${texto}

            </div>

        </div>
    `;

    chat.scrollTop =
        chat.scrollHeight;
}
</script>

@endpush