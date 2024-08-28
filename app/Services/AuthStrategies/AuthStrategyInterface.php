<?php

namespace App\Services\AuthStrategies;

interface AuthStrategyInterface
{
    public function checkToken($provider): bool;
    public function authenticate($credentials);
}
