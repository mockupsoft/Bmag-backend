<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository
{
    private User $user;

    /**
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function create($userData): User
    {
        $user = $this->user->create([
            'name_surname' => $userData['name_surname'],
            'email' => $userData['email'],
            'password' => Hash::make($userData['password']),
            'phone_number' => $userData['phone_number'],
            'phone_verification_code' => random_int(10000, 99999),
        ]);

        $user->assignRole('editör');
        return $user;
    }

    public function getUserById($userId): ?User
    {
        return $this->user->find($userId);
    }

    public function userActive($user): bool
    {
        return $this->user->find($user->id)->update(['phone_is_verified' => 1]);
    }
}
