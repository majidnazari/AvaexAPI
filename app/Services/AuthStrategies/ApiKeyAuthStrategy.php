<?php

namespace App\Services\AuthStrategies;

use Illuminate\Support\Facades\Http;
use Log;

class ApiKeyAuthStrategy implements AuthStrategyInterface
{
    public function getToken(array $credentials): array
    {

        $url = $credentials['base_url'] . $credentials['token_url'];
        Log::info("ApiKeyAuthStrategy url is"  . json_encode($url));
        Log::info("ApiKeyAuthStrategy" . json_encode($credentials));

        $result = Http::post($url, [
            'username' => $credentials['username'],
            'password' => $credentials['password'],
            'apiKey' => $credentials['api_key'],
        ])->json();

        Log::info("ApiKeyAuthStrategy result is:" . json_encode($result));

        return $result;
    }
}
