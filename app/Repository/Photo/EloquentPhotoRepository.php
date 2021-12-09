<?php

namespace App\Repository\Photo;

use App\Models\Photo;
use Illuminate\Database\Eloquent\Collection;

//use Illuminate\Support\Facades\DB;

class EloquentPhotoRepository implements EloquentPhotoRepositoryInterface
{

    public function createPhoto(Photo $photo): Photo
    {

//        DB::table('users')->insert([]);

        $photo->save();

        return $photo;
    }

    public function getById(int $id): Photo
    {
//        DB::table('users')->where('id', $id)->get();
//        DB::table('users')
//            ->select(DB::raw('count(*) as user_count, status'))
//            ->where('status', '<>', 1)
//            ->groupBy('status')
//            ->get();
        return Photo::where('id', $id)->firstOrFail();
    }

    public function all(): Collection
    {
        return Photo::all();
    }
}
