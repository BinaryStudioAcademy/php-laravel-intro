<?php

namespace App\View\Composers;

use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\Collection;
use Illuminate\View\View;

class ProfileComposer
{

    protected UserRepositoryInterface $userRepository;
    private Collection $users;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
        $this->users = $this->userRepository->list();
    }

    public function compose(View $view)
    {
        $view->with('count', $this->users->count())->with('users', $this->users);
    }
}
