<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class AzureDocumentIntelligenceService
{
    private string $endpoint;

    private string $key;

    public function __construct()
    {
        $this->endpoint = config(
            'azure.document_intelligence.endpoint'
        );

        $this->key = config(
            'azure.document_intelligence.key'
        );
    }

    public function analyzeInvoice(
        string $filePath
    ): array {

        $url = sprintf(
            '%s/documentintelligence/documentModels/prebuilt-invoice:analyze?api-version=2024-11-30',
            rtrim($this->endpoint,'/')
        );

        $response = Http::withHeaders([

            'Ocp-Apim-Subscription-Key' =>
                $this->key,

            'Content-Type' =>
                'application/octet-stream'

        ])->send(

            'POST',
            $url,
            [
                'body' => file_get_contents(
                    $filePath
                )
            ]
        );

        if (! $response->successful()) {

            throw new \Exception(
                $response->body()
            );
        }

        return [

            'operation_location' =>
                $response->header(
                    'Operation-Location'
                )
        ];
    }

    public function getResult(
        string $operationLocation
    ): array {

        $response = Http::withHeaders([

            'Ocp-Apim-Subscription-Key' =>
                $this->key

        ])->get(
            $operationLocation
        );

        return $response->json();
    }
}