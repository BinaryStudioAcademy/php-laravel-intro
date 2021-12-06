<?php

namespace App\Repositories\User;

class UserRepository implements UserRepositoryInterface
{

    const USERS = [
        [
            'id' => 1,
            'name' => 'John',
        ],
        [
            'id' => 2,
            'name' => 'Jack',
        ],
        [
            'id' => 3,
            'name' => 'Jude',
        ],
    ];

    public function getUsers(): array
    {
        return self::USERS;
    }

    public function getUserById(int $userId): array
    {
        $user = [];

        foreach (self::USERS as $DbUser) {
            if($DbUser['id'] === $userId) {
                $user = $DbUser;
                break;
            }
        }

        return $user;
    }
}
