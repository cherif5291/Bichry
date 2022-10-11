<?php

namespace App\Policies;

use App\Models\User;
use App\Models\ModelesFacture;
use Illuminate\Auth\Access\HandlesAuthorization;

class ModelesFacturePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the modelesFacture can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list modelesfactures');
    }

    /**
     * Determine whether the modelesFacture can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ModelesFacture  $model
     * @return mixed
     */
    public function view(User $user, ModelesFacture $model)
    {
        return $user->hasPermissionTo('view modelesfactures');
    }

    /**
     * Determine whether the modelesFacture can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create modelesfactures');
    }

    /**
     * Determine whether the modelesFacture can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ModelesFacture  $model
     * @return mixed
     */
    public function update(User $user, ModelesFacture $model)
    {
        return $user->hasPermissionTo('update modelesfactures');
    }

    /**
     * Determine whether the modelesFacture can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ModelesFacture  $model
     * @return mixed
     */
    public function delete(User $user, ModelesFacture $model)
    {
        return $user->hasPermissionTo('delete modelesfactures');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ModelesFacture  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete modelesfactures');
    }

    /**
     * Determine whether the modelesFacture can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ModelesFacture  $model
     * @return mixed
     */
    public function restore(User $user, ModelesFacture $model)
    {
        return false;
    }

    /**
     * Determine whether the modelesFacture can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ModelesFacture  $model
     * @return mixed
     */
    public function forceDelete(User $user, ModelesFacture $model)
    {
        return false;
    }
}
