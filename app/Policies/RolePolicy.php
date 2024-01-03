<?php

namespace App\Policies;

use App\Models\User;

class RolePolicy
{
    public function admin(User $user): bool
    {
        return $user->role > 10;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function superadmin(User $user): bool
    {
        return $user->role > 15;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, User $model): bool
    {
        //
    }
}
