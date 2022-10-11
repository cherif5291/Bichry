<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Invitation;
use Illuminate\Auth\Access\HandlesAuthorization;

class InvitationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the invitation can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list invitations');
    }

    /**
     * Determine whether the invitation can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Invitation  $model
     * @return mixed
     */
    public function view(User $user, Invitation $model)
    {
        return $user->hasPermissionTo('view invitations');
    }

    /**
     * Determine whether the invitation can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create invitations');
    }

    /**
     * Determine whether the invitation can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Invitation  $model
     * @return mixed
     */
    public function update(User $user, Invitation $model)
    {
        return $user->hasPermissionTo('update invitations');
    }

    /**
     * Determine whether the invitation can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Invitation  $model
     * @return mixed
     */
    public function delete(User $user, Invitation $model)
    {
        return $user->hasPermissionTo('delete invitations');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Invitation  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete invitations');
    }

    /**
     * Determine whether the invitation can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Invitation  $model
     * @return mixed
     */
    public function restore(User $user, Invitation $model)
    {
        return false;
    }

    /**
     * Determine whether the invitation can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Invitation  $model
     * @return mixed
     */
    public function forceDelete(User $user, Invitation $model)
    {
        return false;
    }
}
