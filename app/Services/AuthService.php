<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use App\Models\provider;
use Carbon\Carbon;
use App\Services\AuthStrategies\AuthStrategyFactory;
use Log;

class AuthService
{
    private $providers;

    public function __construct()
    {
        $this->providers = Provider::where('status', 'Active')->get();
        Log::info("providers are:" . json_encode($this->providers));
    }

    public function authenticate()
    {
        foreach ($this->providers as $provider) {
            $this->checkAndRefreshToken($provider);
        }

        // $providers_tmp = "";
        // foreach ($this->providers as $provider) {

        //     $providers_tmp .= $provider['name'] . "  ";
        //     // if (!$this->isTokenValid($provider)) {
        //     //     $this->refreshToken($provider);
        //     // }
        // }
        // return $providers_tmp;
    }
    // private function checkAndRefreshToken($provider)
    // {
    //     Log::info("checkAndRefreshToken: " . !$provider->token . " || " . $this->isTokenExpired($provider));
    //     if (!$provider->token || $this->isTokenExpired($provider)) {



    //         $newTokenData = $this->getTokenFromProvider($provider);
    //         $this->updateProviderToken($provider, $newTokenData);

    //         Log::info("checkAndRefreshToken: inside if" . " $newTokenData " . " and updated provide is:  " . json_encode($provider));
    //     }
    // }

    private function checkAndRefreshToken($provider)
    {
        Log::info("checkAndRefreshToken: " . (!$provider->token) . " || " . $this->isTokenExpired($provider));
        if (!$provider->token || $this->isTokenExpired($provider)) {

            Log::info("token is null or expired and should be requested: " . (!$provider->token) . " || " . $this->isTokenExpired($provider));

            $strategy = AuthStrategyFactory::create($provider);

            $newTokenData = $strategy->getToken([
                'username' => $provider->user_name,
                'password' => $provider->password,
                'base_url' => $provider->base_url,
                'token_url' => $provider->token_url,
                'api_key' => $provider->api_key ?? null,
                'grant_type' => $provider->grant_type ?? null
            ]);
            Log::info("newTokenData: " . json_encode($newTokenData));
            if ($provider['grant_type'] && $newTokenData && $newTokenData['access_token']) {
                $this->updateProviderToken($provider, $newTokenData);
            } else if ($provider['api_key'] && $newTokenData && $newTokenData['accessToken']) {
                $this->updateProviderToken($provider, $newTokenData);
            } else {
                Log::info("error");
            }
        }
    }

    private function isTokenExpired($provider)
    {
        //Log::info("isTokenExpiredcheck: " . !$provider->expire_date);

        if (!$provider->expire_date) {
            return true;
        }

        Log::info("isTokenExpired past check: " . Carbon::parse($provider->expire_date)->isPast());

        return Carbon::parse($provider->expire_date)->isPast();
    }

    // private function getTokenFromProvider($provider)
    // {
    //     // Call the provider's token endpoint to get a new token
    //     $response = Http::post($provider->token_url, [
    //         'username' => $provider->user_name,
    //         'password' => $provider->pass,
    //         'apiKey' => $provider->api_key, // If required
    //         'refreshToken' => $provider->refresh_token // If applicable
    //     ]);

    //     Log::info("getTokenFromProvider: " . Carbon::parse($provider->expire_date)->isPast());

    //     return $response->json();
    // }

    private function updateProviderToken($provider, $tokenData)
    {
        $access_token = "";
        $refresh_token = "";

        if ($tokenData && isset($tokenData['access_token'])) {
            $access_token = $tokenData['access_token'];
            $refresh_token = $tokenData['refresh_token'];
        } else if ($tokenData && isset($tokenData['accessToken'])) {
            $access_token = $tokenData['accessToken'];
            $refresh_token = $tokenData['refreshToken'];
        }
        Log::info("token is :" . json_encode($tokenData));
        Log::info(" access_token is :" .  $access_token . " tokenData['accessToken']" . $tokenData['accessToken']);
        Log::info(" refresh_token is :" .  $refresh_token);

        $provider['token'] =  $access_token;
        $provider['refresh_token'] =  $refresh_token;

        Log::info(" provider['token'] is: " .  $provider['token'] . "and access token is:" . $access_token);
        $provider->expire_date = isset($tokenData['expires_in']) ? Carbon::now()->addSeconds($tokenData['expires_in']) : Carbon::now()->addSeconds(3600); // Adjust based on response
        $provider->save();

        Log::info("provider updated:" . json_encode($provider));
    }
}
