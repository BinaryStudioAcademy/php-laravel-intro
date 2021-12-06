<?php

namespace App\Services\Search;

use http\Exception\InvalidArgumentException;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class SearchService
{

    const MYSQL_DRIVER = 'MYSQL';
    const ELASTIC_DRIVER = 'ElasticSearch';
    const AVAILABLE_DRIVERS = [self::MYSQL_DRIVER, self::ELASTIC_DRIVER];

    private string $driver;

    public function __construct(array $config)
    {
        $this->driver = $config['driver'];

        $this->connect();
    }

    public function getDriver()
    {
        return $this->driver;
    }

    public function connect()
    {
        if( $this->driver === self::MYSQL_DRIVER) {
            $this->connectMysql();
        } else if ($this->driver === self::ELASTIC_DRIVER){
            $this->connectElastic();
        } else {
            throw new InvalidArgumentException();
        }
    }

    private function connectMysql()
    {
        //...
    }

    private function connectElastic()
    {
        //...
    }


}
