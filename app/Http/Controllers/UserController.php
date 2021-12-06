<?php

namespace App\Http\Controllers;

use App\Actions\User\GetUsersAction;
use App\Actions\User\ShowUserAction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    public function index(GetUsersAction $getUsersAction): JsonResponse
    {
        return response()->json(['data' => $getUsersAction->execute()], Response::HTTP_OK);
    }

    public function show(int $userId, ShowUserAction $showUserAction): JsonResponse
    {
        $user = $showUserAction->execute($userId);

        $status = count($user) > 0 ? Response::HTTP_OK : Response::HTTP_NOT_FOUND;

        return response()->json(['data' => $user], $status);
    }

    public function create(Request $request)
    {
        $data = $request->all();

        return response()->json(['data' => $data, 'message'=> 'User was created!'], Response::HTTP_CREATED);
    }
}
