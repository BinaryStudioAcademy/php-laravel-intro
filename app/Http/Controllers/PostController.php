<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PostController extends Controller
{
    public function index()
    {
        return response()->json(['message' => 'Ok'], Response::HTTP_OK);
    }
}
