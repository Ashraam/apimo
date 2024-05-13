<?php

namespace Ashraam\Apimo;

use Illuminate\Support\Facades\Http;

class Apimo
{
    public $client;

    public function __construct(int $provider, string $token, string $base_url)
    {
        $this->client = Http::baseUrl($base_url)
            ->withBasicAuth($provider, $token)
            ->throw();
    }
}
