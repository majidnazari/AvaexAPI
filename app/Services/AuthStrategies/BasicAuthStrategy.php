<?php

namespace App\Services\AuthStrategies;

use Illuminate\Support\Facades\Http;

class BasicAuthStrategy implements AuthStrategyInterface
{
    public function getToken(array $credentials): array
    {
        return Http::post($credentials['token_url'], [
            'username' => $credentials['username'],
            'password' => $credentials['password'],
        ])->json();
    }
}
