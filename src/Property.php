<?php

namespace Ashraam\Apimo;

class Property
{
    private Apimo $apimo;

    private int $agency;

    public function __construct(Apimo $apimo, int $agency)
    {
        $this->apimo = $apimo;
        $this->agency = $agency;
    }

    public function all(int $limit = 1000, int $offset = 0, ?int $timestamps = null, ?int $step = null, ?int $status = null, ?int $group = null)
    {
        return $this->apimo->client->get("agencies/{$this->agency}/properties?limit={$limit}&offset={$offset}&timestamps={$timestamps}&step={$step}&status={$status}&group={$group}")->json();
    }

}
