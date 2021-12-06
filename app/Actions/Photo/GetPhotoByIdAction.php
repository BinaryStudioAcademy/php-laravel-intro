<?php

namespace App\Actions\Photo;

use App\Models\Photo;
use App\Repository\Photo\EloquentPhotoRepositoryInterface;

class GetPhotoByIdAction
{
    private EloquentPhotoRepositoryInterface $eloquentPhotoRepository;

    public function __construct(EloquentPhotoRepositoryInterface $eloquentPhotoRepository)
    {
        $this->eloquentPhotoRepository = $eloquentPhotoRepository;
    }

    public function execute(int $id): Photo
    {
        return $this->eloquentPhotoRepository->getById($id);
    }
}
