<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use App\Models\provider;
use Carbon\Carbon;
use App\Services\AuthStrategies\AuthStrategyInterface;
use App\Services\AuthStrategies\PostAuth;
use App\Services\AuthStrategies\TipaxAuth;

use Log;

class InquiryService
{

    protected $apis;
    public function __construct()
    {
        $this->apis = Provider::where('status','Active')->get();
    }
    public function inquiry(User $user)
    {
        public function getPricing($parcelDetails)
    {
        $responses = [];

        foreach ($this->apis as $key => $apiUrl) {
            $response = Http::post("{$apiUrl}/getPricing", $parcelDetails);
            $responses[$key] = $response->json();
        }

        return $responses;
    }

    }
    public function cancel (
        {
            $user = $this->getUser($user);
            Log::info("the inquiry in needed here ");
        }
    )
}