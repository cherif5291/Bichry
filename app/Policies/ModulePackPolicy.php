<?php

namespace App\Policies;

use App\Models\User;
use App\Models\ModulePack;
use Illuminate\Auth\Access\HandlesAuthorization;

class ModulePackPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the modulePack can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list modulepacks');
    }

    /**
     * Determine whether the modulePack can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ModulePack  $model
     * @return mixed
     */
    public function view(User $user, ModulePack $model)
    {
        return $user->hasPermissionTo('view modulepacks');
    }

    /**
     * Determine whether the modulePack can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create modulepacks');
    }

    /**
     * Determine whether the modulePack can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ModulePack  $model
     * @return mixed
     */
    public function update(User $user, ModulePack $model)
    {
        return $user->hasPermissionTo('update modulepacks');
    }

    /**
     * Determine whether the modulePack can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ModulePack  $model
     * @return mixed
     */
    public function delete(User $user, ModulePack $model)
    {
        return $user->hasPermissionTo('delete modulepacks');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ModulePack  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete modulepacks');
    }

    /**
     * Determine whether the modulePack can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ModulePack  $model
     * @return mixed
     */
    public function restore(User $user, ModulePack $model)
    {
        return false;
    }

    /**
     * Determine whether the modulePack can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ModulePack  $model
     * @return mixed
     */
    public function forceDelete(User $user, ModulePack $model)
    {
        return false;
    }
}
