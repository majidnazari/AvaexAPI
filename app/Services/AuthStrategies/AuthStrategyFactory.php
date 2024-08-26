<?php

namespace App\Services\AuthStrategies;

use Log;

class AuthStrategyFactory
{
    public static function create($provider): AuthStrategyInterface
    {
        Log::info("the AuthStrategyFactory is " . json_encode($provider));
        Log::info("the provider->grant_type is " . $provider['grant_type']);
        Log::info("the provider->api_key is " . $provider['api_key']);
        if ($provider->grant_type) {
            Log::info("inside grant_type  ");

            return new GrantTypeAuthStrategy();
        } else if ($provider->api_key) {
            Log::info("inside api_key  ");

            return new ApiKeyAuthStrategy();
        } else {
            Log::info("inside else  ");

            return new BasicAuthStrategy();
        }
    }
}
