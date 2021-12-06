<?php

namespace App\Services\Search;

class ElasticSearchService implements SearchInterface
{
    private string $driver = 'ElasticSearch';

    public function getDriver(): string
    {
        return $this->driver;
    }
}
