<?php

namespace App\Services;

class DocumentIntelligenceParser
{
    public function parse(array $response): array
    {
        $document =
            $response['analyzeResult']['documents'][0]
            ?? [];

        $fields =
            $document['fields']
            ?? [];

        return [

            'proveedor' =>
                $fields['VendorName']['content']
                ?? null,

            'fecha_factura' =>
                $fields['InvoiceDate']['valueDate']
                ?? null,

            'folio' =>
                $fields['InvoiceId']['content']
                ?? null,

            'subtotal' =>
                $fields['SubTotal']['valueCurrency']['amount']
                ?? 0,

            'iva' =>
                $fields['TotalTax']['valueCurrency']['amount']
                ?? 0,

            'total' =>
                $fields['InvoiceTotal']['valueCurrency']['amount']
                ?? 0,
        ];
    }
}