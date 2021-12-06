<?php

namespace App\Repository\Photo;

use App\Models\Photo;

class EloquentPhotoRepository implements EloquentPhotoRepositoryInterface
{

    public function createPhoto(array $data): Photo
    {
        $photo = new Photo();

        $photo->name = $data['format'];

        $photo->save();

        return $photo;
    }

    public function getById(int $id): Photo
    {
        return Photo::where('id', $id)->firstOrFail();
    }
}
