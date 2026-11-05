<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class AzureOpenAIService
{
    public function ask(
        string $question
    ): string {

        $response = Http::withHeaders([

            'api-key' =>
                config('azure.openai.key'),

            'Content-Type' =>
                'application/json'

        ])->post(

            config('azure.openai.endpoint')
            . '/chat/completions',

            [

                'model' =>
                    config('azure.openai.model'),

                'messages' => [

                    [

                        'role' => 'system',

'content' => '

Eres el router de herramientas de una empresa llamada Río Claro.

Debes responder ÚNICAMENTE una palabra.

Opciones permitidas:

inventario
facturas
movimientos
proveedores
politicas
desconocido

Reglas:

Preguntas relacionadas con:

stock
inventario
existencias
almacén
productos
reposición

→ inventario

Preguntas relacionadas con:

facturas
compras
gastos
pagos

→ facturas

Preguntas relacionadas con:

movimientos
entradas
salidas
ajustes

→ movimientos

Preguntas relacionadas con:

proveedores
abastecimiento
suministro

→ proveedores

Preguntas relacionadas con:

políticas
normas
procedimientos
manuales
FAQ

→ politicas

Responde únicamente la palabra.
'

                    ],

                    [

                        'role' => 'user',

                        'content' => $question

                    ]

                ]

            ]

        );

        if (! $response->successful()) {

            throw new \Exception(
                json_encode(
                    $response->json(),
                    JSON_PRETTY_PRINT
                )
            );
        }

        $respuesta = trim(

            strtolower(

                $response['choices'][0]
                ['message']
                ['content']

            )

        );

        logger()->info(
            'Respuesta GPT',
            [
                'pregunta' => $question,
                'respuesta' => $respuesta
            ]
        );

        return $respuesta;
    }
}