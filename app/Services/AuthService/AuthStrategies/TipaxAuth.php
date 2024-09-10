<?php

namespace App\Services\AuthStrategies;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Carbon;

use Log;

class TipaxAuth implements AuthStrategyInterface
{
    public function checkToken($provider): bool
    {
        return (Carbon::now()->format("Y-m-d H:i:s") > $provider->expires_in);
    }

    public function authenticate($credentials)
    {
        $url = $credentials->base_url . $credentials->token_url;

        $result = Http::post($url, [
            'username' => $credentials->user_name,
            'password' => $credentials->password,
            'apiKey' => $credentials->api_key,
        ])->json();
        if ($result) {
            $result = $this->updateCredintioanl($credentials, $result);
            return $result;
        } else {
            return $credentials;
        }
    }

    private function updateCredintioanl($provider, $result)
    {

        $provider->access_token =  $result['accessToken'];
        $provider->refresh_token = $result['refreshToken'];

        $provider->expires_in = isset($tokenData['expires_in']) ? Carbon::now()->addSeconds($tokenData['expires_in']) : Carbon::now()->addSeconds(3600); // Adjust based on response
        $provider->save();
        return $provider;
    }
}
