<?php

namespace App\Repositories\User;

use App\Models\User;
use Illuminate\Support\Collection;

class UserRepository implements UserRepositoryInterface
{

    public function list(): Collection
    {
        return User::all();
    }
}
