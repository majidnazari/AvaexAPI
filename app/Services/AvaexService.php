<?php

namespace App\Services;

use App\Services\Contracts\ServicesInterface;
use Illuminate\Support\Facades\Http;

class SpaceService implements AvaexServiceInterface
{
    private $providers;

    public function __construct(array $providers)
    {
        $this->providers = $providers;
    }

    public function getPricing(array $data)
    {
        $results = [];

        foreach ($this->providers as $provider) {
            $results[get_class($provider)] = $provider->getPricing($data);
        }

        // Aggregate results here if needed
        return $results;
    }

    public function createOrder(array $data)
    {
        $results = [];

        foreach ($this->providers as $provider) {
            $results[get_class($provider)] = $provider->createOrder($data);
        }

        // Combine or process results as needed
        return $results;
    }

    public function trackOrder(string $orderId)
    {
        $results = [];

        foreach ($this->providers as $provider) {
            $results[get_class($provider)] = $provider->trackOrder($orderId);
        }

        // Combine or process results as needed
        return $results;
    }

    public function cancelOrder(string $orderId)
    {
        $results = [];

        foreach ($this->providers as $provider) {
            $results[get_class($provider)] = $provider->cancelOrder($orderId);
        }

        // Combine or process results as needed
        return $results;
    }
}
