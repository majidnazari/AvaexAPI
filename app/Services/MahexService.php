<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class MahexService
{
    private $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    public function getRates($data)
    {
        $response = Http::withToken($this->token)->post('provider_c_url/rates', $data);
        return $response->json();
    }

    public function createShipment($data)
    {
        $response = Http::withToken($this->token)->post('provider_c_url/shipments', $data);
        return $response->json();
    }

    public function getShipmentStatus($shipmentUuid)
    {
        $response = Http::withToken($this->token)->get("provider_c_url/shipments/{$shipmentUuid}");
        return $response->json();
    }

    public function voidShipment($waybillNumber)
    {
        $response = Http::withToken($this->token)->put("provider_c_url/shipments/{$waybillNumber}/void");
        return $response->json();
    }
}
