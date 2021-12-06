<?php

namespace App\Repositories\User;

interface UserRepositoryInterface
{
    public function getUsers(): array;
    public function getUserById(int $userId): array;
}
