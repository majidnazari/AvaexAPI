<?php

namespace App\Services\AuthStrategies;

interface AuthStrategyInterface
{
    public function getToken(array $credentials): array;
}
