<?php

namespace App\Http\Controllers;

use App\Services\Search\SearchInterface;
use App\Services\Search\SearchService;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    private SearchInterface $search;

    public function __construct(SearchInterface $search)
    {
        $this->search = $search;
    }

    public function getSearchDriverFromAppServiceProvider()
    {
        return $this->search->getDriver();
    }

    public function getSearchDriverFromSearchServiceProvider(SearchService $searchService)
    {
        return $searchService->getDriver();
    }
}
