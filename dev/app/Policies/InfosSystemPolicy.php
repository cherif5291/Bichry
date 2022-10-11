<?php

namespace App\Policies;

use App\Models\User;
use App\Models\InfosSystem;
use Illuminate\Auth\Access\HandlesAuthorization;

class InfosSystemPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the infosSystem can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list infossystems');
    }

    /**
     * Determine whether the infosSystem can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\InfosSystem  $model
     * @return mixed
     */
    public function view(User $user, InfosSystem $model)
    {
        return $user->hasPermissionTo('view infossystems');
    }

    /**
     * Determine whether the infosSystem can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create infossystems');
    }

    /**
     * Determine whether the infosSystem can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\InfosSystem  $model
     * @return mixed
     */
    public function update(User $user, InfosSystem $model)
    {
        return $user->hasPermissionTo('update infossystems');
    }

    /**
     * Determine whether the infosSystem can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\InfosSystem  $model
     * @return mixed
     */
    public function delete(User $user, InfosSystem $model)
    {
        return $user->hasPermissionTo('delete infossystems');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\InfosSystem  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete infossystems');
    }

    /**
     * Determine whether the infosSystem can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\InfosSystem  $model
     * @return mixed
     */
    public function restore(User $user, InfosSystem $model)
    {
        return false;
    }

    /**
     * Determine whether the infosSystem can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\InfosSystem  $model
     * @return mixed
     */
    public function forceDelete(User $user, InfosSystem $model)
    {
        return false;
    }
}
