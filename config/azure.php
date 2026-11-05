<?php

return [
    'document_intelligence' => [
        'endpoint' => env('AZURE_DOC_INTELLIGENCE_ENDPOINT'),
        'key' => env('AZURE_DOC_INTELLIGENCE_KEY'),
    ],
    'openai' => [
        'endpoint' => env('AZURE_OPENAI_ENDPOINT'),
        'key' => env('AZURE_OPENAI_KEY'),
        'model' => env('AZURE_OPENAI_MODEL'),
    ]
];