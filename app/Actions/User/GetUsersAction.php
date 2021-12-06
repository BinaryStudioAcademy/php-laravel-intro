<?php

namespace App\Actions\User;

use App\Repositories\User\UserRepositoryInterface;

class GetUsersAction
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute(): array
    {
        return $this->userRepository->getUsers();
    }

}
