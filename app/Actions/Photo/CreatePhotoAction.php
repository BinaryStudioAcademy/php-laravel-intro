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
        return $this->eloquentPhotoRepository->createPhoto($data);
    }
}
