<?php

namespace App\Services\Contracts;

interface AvaexServiceInterface
{
    public function getPricing(array $data);
    public function createOrder(array $data);
    public function trackOrder(string $orderId);
    public function cancelOrder(string $orderId);
}
