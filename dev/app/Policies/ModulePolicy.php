<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Module;
use Illuminate\Auth\Access\HandlesAuthorization;

class ModulePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the module can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list modules');
    }

    /**
     * Determine whether the module can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Module  $model
     * @return mixed
     */
    public function view(User $user, Module $model)
    {
        return $user->hasPermissionTo('view modules');
    }

    /**
     * Determine whether the module can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create modules');
    }

    /**
     * Determine whether the module can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Module  $model
     * @return mixed
     */
    public function update(User $user, Module $model)
    {
        return $user->hasPermissionTo('update modules');
    }

    /**
     * Determine whether the module can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Module  $model
     * @return mixed
     */
    public function delete(User $user, Module $model)
    {
        return $user->hasPermissionTo('delete modules');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Module  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete modules');
    }

    /**
     * Determine whether the module can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Module  $model
     * @return mixed
     */
    public function restore(User $user, Module $model)
    {
        return false;
    }

    /**
     * Determine whether the module can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Module  $model
     * @return mixed
     */
    public function forceDelete(User $user, Module $model)
    {
        return false;
    }
}
