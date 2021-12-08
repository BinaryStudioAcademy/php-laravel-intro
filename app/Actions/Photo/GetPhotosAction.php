<?php

namespace App\Actions\Photo;

use App\Models\Photo;
use App\Repository\Photo\EloquentPhotoRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class GetPhotosAction
{
    private EloquentPhotoRepositoryInterface $eloquentPhotoRepository;

    public function __construct(EloquentPhotoRepositoryInterface $eloquentPhotoRepository)
    {
        $this->eloquentPhotoRepository = $eloquentPhotoRepository;
    }

    public function execute(): Collection
    {
        return $this->eloquentPhotoRepository->all();
    }
}
