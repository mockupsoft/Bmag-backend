<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;

class UserService
{
    private UserRepository $userRepository;

    /**
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function create($userData): User
    {
        return $this->userRepository->create($userData);
    }

    public function getUserById($userId): ?User
    {
        return $this->userRepository->getUserById($userId);
    }

    public function userActive($user): bool
    {
        return $this->userRepository->userActive($user);
    }
}
