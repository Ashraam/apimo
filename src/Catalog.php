<?php

namespace Ashraam\Apimo;

class Catalog
{
    private Apimo $apimo;

    public string $lang;

    public function __construct(Apimo $apimo, string $lang = 'fr')
    {
        $this->apimo = $apimo;
        $this->lang = $lang;
    }

    public function all(): array
    {
        return $this->apimo->client->get("catalogs?culture={$this->lang}")->json();
    }

    public function get($catalog): array
    {
        return $this->apimo->client->get("catalogs/{$catalog}?culture={$this->lang}")->json();
    }
}
