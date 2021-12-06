<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessPodcast;
use App\Models\Podcast;
use Illuminate\Http\Response;

class JobController extends Controller
{
    public function index()
    {
        $podcast = new Podcast();
        $podcast->name = 'podcast';
        $podcast->save();

        ProcessPodcast::dispatch($podcast);
        return response()->json(['message' => 'Job was added to queue'], Response::HTTP_OK);
    }
}
