<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ChaparService
{
    private $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    public function getCities()
    {
        $response = Http::withToken($this->token)->get('provider_d_url/cities');
        return $response->json();
    }

    public function getPricing($data)
    {
        $response = Http::withToken($this->token)->post('provider_d_url/pricing', $data);
        return $response->json();
    }

    public function createOrder($data)
    {
        $response = Http::withToken($this->token)->post('provider_d_url/orders', $data);
        return $response->json();
    }
}
