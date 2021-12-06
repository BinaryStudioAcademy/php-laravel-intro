<?php

namespace App\Repository\Photo;

use App\Models\Photo;

interface EloquentPhotoRepositoryInterface
{
    public function createPhoto(array $data): Photo;
    public function getById(int $id): Photo;
}
