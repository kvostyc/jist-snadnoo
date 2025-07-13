<?php

namespace App\Core\Services;

use App\Models\User;

/**
* Service for user operations
*/
class UserService extends BaseEntityService
{
    protected ?string $model = User::class;

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