<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use App\Models\provider;
use Carbon\Carbon;
use App\Services\AuthStrategies\AuthStrategyInterface;
use App\Services\AuthStrategies\PostAuth;
use App\Services\AuthStrategies\TipaxAuth;

use Log;

class AuthService
{
    private $authService;

    public function __construct(/*AuthService $authService*/)
    {
        //$this->authService = new AuthService;
    }

    public function authenticateAllProviders()
    {
        // Fetch all active providers
        $providers = Provider::where('status', 'active')->get();

        foreach ($providers as $provider) {

            $strategy = $this->getStrategyForProvider($provider->name);

            $strategyClass = "App\\Services\\AuthStrategies\\" . $provider->name . "Auth";

            if (class_exists($strategyClass)) {
                // Dynamically instantiate the class
                $strategyInstance = new $strategyClass();
                $getTokens =  $strategyInstance->checkToken($provider);

                if ($getTokens) {
                    $tokens = $strategyInstance->authenticate($provider);
                }
            }
        }
        return response()->json(['status' => 'All providers processed']);
    }

    private function getStrategyForProvider(string $providerName)
    {
        // Map provider names to their respective strategy
        switch ($providerName) {
            case 'Post':
                return app(PostAuth::class);
            case 'Tipax':
                return app(TipaxAuth::class);

            case 'Mehax':
                return null;
            case 'Chapar':
                return null;

            default:
                return null;
        }
    }
}
