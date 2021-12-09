<?php

namespace App\Actions\Photo;

use App\Models\Photo;
use App\Repository\Photo\EloquentPhotoRepositoryInterface;

class CreatePhotoAction
{
    private EloquentPhotoRepositoryInterface $eloquentPhotoRepository;

    public function __construct(EloquentPhotoRepositoryInterface $eloquentPhotoRepository)
    {
        $this->eloquentPhotoRepository = $eloquentPhotoRepository;
    }

    public function execute(array $data): Photo
    {

        $photo = new Photo();
        $photo->name = $data['format'];

        return $this->eloquentPhotoRepository->createPhoto($photo);
    }
}
