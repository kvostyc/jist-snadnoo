<?php

namespace App\Core\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

/**
* Service for user operations
*/
class UserService extends BaseEntityService
{
    protected ?string $model = User::class;

    /**
    * Create new user with hashed password
    */
    public function createUser(array $data): User
    {
        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }

        return $this->create($data);
    }

    /**
    * Find user by email address
    */
    public function findByEmail(string $email): ?User
    {
        return User::where('email', $email)->first();
    }

    /**
    * Get all admin users
    */
    public function findAdmins()
    {
        return User::where('is_admin', true)->get();
    }

    /**
    * Get all regular users
    */
    public function findRegularUsers()
    {
        return User::where('is_admin', false)->get();
    }
} 