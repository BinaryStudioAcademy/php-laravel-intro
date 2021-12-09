<?php

namespace App\Repository\Photo;

use App\Models\Photo;
use Illuminate\Database\Eloquent\Collection;

interface EloquentPhotoRepositoryInterface
{
    public function createPhoto(Photo $photo): Photo;
    public function getById(int $id): Photo;
    public function all(): Collection;
}
