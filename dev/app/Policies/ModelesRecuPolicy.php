<?php

namespace App\Policies;

use App\Models\User;
use App\Models\ModelesRecu;
use Illuminate\Auth\Access\HandlesAuthorization;

class ModelesRecuPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the modelesRecu can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list modelesrecus');
    }

    /**
     * Determine whether the modelesRecu can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ModelesRecu  $model
     * @return mixed
     */
    public function view(User $user, ModelesRecu $model)
    {
        return $user->hasPermissionTo('view modelesrecus');
    }

    /**
     * Determine whether the modelesRecu can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create modelesrecus');
    }

    /**
     * Determine whether the modelesRecu can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ModelesRecu  $model
     * @return mixed
     */
    public function update(User $user, ModelesRecu $model)
    {
        return $user->hasPermissionTo('update modelesrecus');
    }

    /**
     * Determine whether the modelesRecu can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ModelesRecu  $model
     * @return mixed
     */
    public function delete(User $user, ModelesRecu $model)
    {
        return $user->hasPermissionTo('delete modelesrecus');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ModelesRecu  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete modelesrecus');
    }

    /**
     * Determine whether the modelesRecu can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ModelesRecu  $model
     * @return mixed
     */
    public function restore(User $user, ModelesRecu $model)
    {
        return false;
    }

    /**
     * Determine whether the modelesRecu can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ModelesRecu  $model
     * @return mixed
     */
    public function forceDelete(User $user, ModelesRecu $model)
    {
        return false;
    }
}
