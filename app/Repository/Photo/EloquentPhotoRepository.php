<?php

namespace App\Repository\Photo;

use App\Models\Photo;
use Illuminate\Database\Eloquent\Collection;

//use Illuminate\Support\Facades\DB;

class EloquentPhotoRepository implements EloquentPhotoRepositoryInterface
{

    public function createPhoto(Photo $photo): Photo
    {

//        DB::table('photos')->insert($data);

        $photo->save();

        return $photo;
    }

    public function getById(int $id): Photo
    {
//        DB::table('photos')->where('id', $id)->get();

        return Photo::where('id', $id)->firstOrFail();
    }

    public function all(): Collection
    {
        return Photo::all();
    }
}
