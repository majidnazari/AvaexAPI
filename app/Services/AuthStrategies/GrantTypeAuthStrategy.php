<?php

namespace App\Services\AuthStrategies;

use Illuminate\Support\Facades\Http;
use Log;

class GrantTypeAuthStrategy implements AuthStrategyInterface
{
    public function getToken(array $credentials): array
    {

        $url = $credentials['base_url'] . $credentials['token_url'];
        Log::info("GrantTypeAuthStrategy" . json_encode($credentials));
        Log::info("password is:" . $credentials['password']);
        return Http::asForm()->post($url, [
            'username' => $credentials['username'],
            'password' => $credentials['password'],
            'grant_type' => $credentials['grant_type'],
        ])->json();
    }
}
