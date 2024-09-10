<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class TipaxService
{
    private $token;

    public function getToken($username, $password, $apiKey)
    {
        $response = Http::post('provider_b_url/getToken', [
            'username' => $username,
            'password' => $password,
            'apiKey' => $apiKey,
        ]);

        $this->token = $response->json()['token'];
        return $this->token;
    }

    public function getPricing($data)
    {
        $response = Http::withToken($this->token)->post('provider_b_url/pricing', $data);
        return $response->json();
    }

    public function createOrder($data)
    {
        $response = Http::withToken($this->token)->post('provider_b_url/orders', $data);
        return $response->json();
    }
}
