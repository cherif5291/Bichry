<?php

namespace App\Policies;

use App\Models\User;
use App\Models\ContratsType;
use Illuminate\Auth\Access\HandlesAuthorization;

class ContratsTypePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the contratsType can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list contratstypes');
    }

    /**
     * Determine whether the contratsType can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ContratsType  $model
     * @return mixed
     */
    public function view(User $user, ContratsType $model)
    {
        return $user->hasPermissionTo('view contratstypes');
    }

    /**
     * Determine whether the contratsType can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create contratstypes');
    }

    /**
     * Determine whether the contratsType can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ContratsType  $model
     * @return mixed
     */
    public function update(User $user, ContratsType $model)
    {
        return $user->hasPermissionTo('update contratstypes');
    }

    /**
     * Determine whether the contratsType can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ContratsType  $model
     * @return mixed
     */
    public function delete(User $user, ContratsType $model)
    {
        return $user->hasPermissionTo('delete contratstypes');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ContratsType  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete contratstypes');
    }

    /**
     * Determine whether the contratsType can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ContratsType  $model
     * @return mixed
     */
    public function restore(User $user, ContratsType $model)
    {
        return false;
    }

    /**
     * Determine whether the contratsType can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ContratsType  $model
     * @return mixed
     */
    public function forceDelete(User $user, ContratsType $model)
    {
        return false;
    }
}
