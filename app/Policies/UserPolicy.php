<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * User policy to check if the current user
     * is equal to the user in $user.
     *
     * This is used to authorize users to edit
     * only their own user attributes.
     *
     * @param User $current_user
     * @param User $user
     * @return bool
     */
    public function edit(User $current_user, User $user): bool
    {
        return $current_user->is($user);
    }
}
