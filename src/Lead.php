<?php

namespace Ashraam\Apimo;

class Lead
{
    private Apimo $apimo;

    private int $agency;

    public function __construct(Apimo $apimo, int $agency)
    {
        $this->apimo = $apimo;
        $this->agency = $agency;
    }

    public function all(int $limit = 1000, int $offset = 0, ?int $timestamps = null)
    {
        return $this->apimo->client->get("agencies/{$this->agency}/leads?limit={$limit}&offset={$offset}&timestamps={$timestamps}")->json();
    }

    public function create(array $data = [])
    {
        return $this->apimo->client->post("agencies/{$this->agency}/leads", $data)->json();
    }
}
