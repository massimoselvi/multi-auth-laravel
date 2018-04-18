<?php

namespace App\Policies;

use App\AdminUser;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminUserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the admin user.
     *
     * @param  \App\User  $user
     * @param  \App\AdminUser  $adminUser
     * @return mixed
     */
    public function view(User $user, AdminUser $adminUser)
    {
        return is_a($user, AdminUser::class);
    }

    /**
     * Determine whether the user can create admin users.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return is_a($user, AdminUser::class);
    }

    /**
     * Determine whether the user can update the admin user.
     *
     * @param  \App\User  $user
     * @param  \App\AdminUser  $adminUser
     * @return mixed
     */
    public function update(User $user, AdminUser $adminUser)
    {
        return $user->getKey() == $adminUser->getKey();
    }

    /**
     * Determine whether the user can delete the admin user.
     *
     * @param  \App\User  $user
     * @param  \App\AdminUser  $adminUser
     * @return mixed
     */
    public function delete(User $user, AdminUser $adminUser)
    {
        return $user->getKey() == $adminUser->getKey();
    }
}
