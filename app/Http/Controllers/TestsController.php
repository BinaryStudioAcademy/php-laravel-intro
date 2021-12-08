<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TestsController extends Controller
{
    public function index()
    {
        return response()->json(['data' => true], Response::HTTP_OK);
    }
}
