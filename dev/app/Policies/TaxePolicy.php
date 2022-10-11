<?php

namespace App\Policies;

use App\Models\Taxe;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaxePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the taxe can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list taxes');
    }

    /**
     * Determine whether the taxe can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Taxe  $model
     * @return mixed
     */
    public function view(User $user, Taxe $model)
    {
        return $user->hasPermissionTo('view taxes');
    }

    /**
     * Determine whether the taxe can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create taxes');
    }

    /**
     * Determine whether the taxe can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Taxe  $model
     * @return mixed
     */
    public function update(User $user, Taxe $model)
    {
        return $user->hasPermissionTo('update taxes');
    }

    /**
     * Determine whether the taxe can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Taxe  $model
     * @return mixed
     */
    public function delete(User $user, Taxe $model)
    {
        return $user->hasPermissionTo('delete taxes');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Taxe  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete taxes');
    }

    /**
     * Determine whether the taxe can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Taxe  $model
     * @return mixed
     */
    public function restore(User $user, Taxe $model)
    {
        return false;
    }

    /**
     * Determine whether the taxe can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Taxe  $model
     * @return mixed
     */
    public function forceDelete(User $user, Taxe $model)
    {
        return false;
    }
}
