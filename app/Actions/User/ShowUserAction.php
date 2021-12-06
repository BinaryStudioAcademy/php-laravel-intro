<?php

namespace App\Actions\User;

use App\Repositories\User\UserRepositoryInterface;

class ShowUserAction
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute(int $userId): array
    {
        return $this->userRepository->getUserById($userId);
    }
}
