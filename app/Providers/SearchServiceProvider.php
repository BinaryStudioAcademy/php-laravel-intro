<?php

namespace App\Providers;

use App\Services\Search\SearchService;
use Illuminate\Support\ServiceProvider;

class SearchServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(SearchService::class, function ($app) {
            return new SearchService(config('search'));
        });
    }
}
