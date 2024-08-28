<?php

namespace App\Services\AuthStrategies;

use Illuminate\Support\Facades\Http;

class MahexAuth implements AuthStrategyInterface
{
    public function checkToken($provider): bool
    {
        //Log::info("the check token iside $provider->name is:" . json_encode($provider));
        return time() > $provider->expires_in;
    }

    public function authenticate($credentials)
    {
        $url = $credentials->base_url . $credentials->token_url;

        $result = Http::post($url, [
            'username' => $credentials->user_name,
            'password' => $credentials->password,
            'base_token' => $credentials->grant_type,
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
        $provider->access_token =  $result['access_token'] ?? null;
        $provider->refresh_token = $result['refresh_token'] ?? null;
        $provider->expires_in = isset($tokenData['expires_in']) ? Carbon::now()->addSeconds($tokenData['expires_in']) : Carbon::now()->addSeconds(3600); // Adjust based on response
        $provider->save();
        return $provider;
    }
}
