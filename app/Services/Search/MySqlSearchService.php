<?php

namespace App\Services\Search;

class MySqlSearchService implements SearchInterface
{
    private string $driver = 'MYSQL';

    public function getDriver(): string
    {
        return $this->driver;
    }
}
