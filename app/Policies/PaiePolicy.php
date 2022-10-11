<?php

namespace App\Policies;

use App\Models\Paie;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PaiePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the paie can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list paies');
    }

    /**
     * Determine whether the paie can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Paie  $model
     * @return mixed
     */
    public function view(User $user, Paie $model)
    {
        return $user->hasPermissionTo('view paies');
    }

    /**
     * Determine whether the paie can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create paies');
    }

    /**
     * Determine whether the paie can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Paie  $model
     * @return mixed
     */
    public function update(User $user, Paie $model)
    {
        return $user->hasPermissionTo('update paies');
    }

    /**
     * Determine whether the paie can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Paie  $model
     * @return mixed
     */
    public function delete(User $user, Paie $model)
    {
        return $user->hasPermissionTo('delete paies');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Paie  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete paies');
    }

    /**
     * Determine whether the paie can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Paie  $model
     * @return mixed
     */
    public function restore(User $user, Paie $model)
    {
        return false;
    }

    /**
     * Determine whether the paie can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Paie  $model
     * @return mixed
     */
    public function forceDelete(User $user, Paie $model)
    {
        return false;
    }
}
