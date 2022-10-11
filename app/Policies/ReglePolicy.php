<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Regle;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReglePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the regle can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list regles');
    }

    /**
     * Determine whether the regle can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Regle  $model
     * @return mixed
     */
    public function view(User $user, Regle $model)
    {
        return $user->hasPermissionTo('view regles');
    }

    /**
     * Determine whether the regle can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create regles');
    }

    /**
     * Determine whether the regle can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Regle  $model
     * @return mixed
     */
    public function update(User $user, Regle $model)
    {
        return $user->hasPermissionTo('update regles');
    }

    /**
     * Determine whether the regle can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Regle  $model
     * @return mixed
     */
    public function delete(User $user, Regle $model)
    {
        return $user->hasPermissionTo('delete regles');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Regle  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete regles');
    }

    /**
     * Determine whether the regle can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Regle  $model
     * @return mixed
     */
    public function restore(User $user, Regle $model)
    {
        return false;
    }

    /**
     * Determine whether the regle can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Regle  $model
     * @return mixed
     */
    public function forceDelete(User $user, Regle $model)
    {
        return false;
    }
}
