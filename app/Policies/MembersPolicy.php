<?php

namespace App\Policies;

use App\Models\Members;
use App\Models\User;

class MembersPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
    public function update(User $user): bool
    {
        return $user->role === 'ADMIN';
    }
}
