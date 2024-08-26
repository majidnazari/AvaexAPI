<?php

namespace App\DTOs;

class TokenDTO
{
    private $provider;
    private $token;
    private $refreshToken;

    public function __construct($provider, $token, $refreshToken = null)
    {
        $this->provider = $provider;
        $this->token = $token;
        $this->refreshToken = $refreshToken;
    }
}
