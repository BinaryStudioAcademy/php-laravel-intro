<?php

namespace App\Http\Controllers;

use App\Actions\Photo\CreatePhotoAction;
use App\Actions\Photo\GetPhotoByIdAction;
use App\Actions\Photo\GetPhotosAction;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PhotoController extends Controller
{
    public function getById(int $id, GetPhotoByIdAction $getPhotoByIdAction)
    {
        $photo = $getPhotoByIdAction->execute($id);

        return response()->json(['data' => $photo], Response::HTTP_OK);
    }

    public function create(Request $request, CreatePhotoAction $createPhotoAction)
    {
        $photo = $createPhotoAction->execute($request->all());

        return response()->json(['data' => $photo], Response::HTTP_CREATED);
    }

    public function all(GetPhotosAction $getPhotosAction)
    {
        return response()->json(['data' => $getPhotosAction->execute()], Response::HTTP_OK);
    }
}
