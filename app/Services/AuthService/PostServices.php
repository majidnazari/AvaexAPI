<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PostServices
{
    private $token;

    public function getToken($type, $username, $password)
    {
        $response = Http::post('provider_a_url/getToken', [
            'type' => $type,
            'username' => $username,
            'password' => $password,
        ]);

        $this->token = $response->json()['token'];
        return $this->token;
    }

    public function getProvinces()
    {
        $response = Http::withToken($this->token)->get('provider_a_url/provinces');
        return $response->json();
    }

    public function getCities()
    {
        $response = Http::withToken($this->token)->get('provider_a_url/cities');
        return $response->json();
    }

    public function getPrice($data)
    {
        $response = Http::withToken($this->token)->post('provider_a_url/price', $data);
        return $response->json();
    }

    public function registerParcel($data)
    {
        $response = Http::withToken($this->token)->post('provider_a_url/parcel_new', $data);
        return $response->json();
    }
}
