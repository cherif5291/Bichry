<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Fournisseur;
use Illuminate\Auth\Access\HandlesAuthorization;

class FournisseurPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the fournisseur can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list fournisseurs');
    }

    /**
     * Determine whether the fournisseur can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Fournisseur  $model
     * @return mixed
     */
    public function view(User $user, Fournisseur $model)
    {
        return $user->hasPermissionTo('view fournisseurs');
    }

    /**
     * Determine whether the fournisseur can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create fournisseurs');
    }

    /**
     * Determine whether the fournisseur can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Fournisseur  $model
     * @return mixed
     */
    public function update(User $user, Fournisseur $model)
    {
        return $user->hasPermissionTo('update fournisseurs');
    }

    /**
     * Determine whether the fournisseur can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Fournisseur  $model
     * @return mixed
     */
    public function delete(User $user, Fournisseur $model)
    {
        return $user->hasPermissionTo('delete fournisseurs');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Fournisseur  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete fournisseurs');
    }

    /**
     * Determine whether the fournisseur can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Fournisseur  $model
     * @return mixed
     */
    public function restore(User $user, Fournisseur $model)
    {
        return false;
    }

    /**
     * Determine whether the fournisseur can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Fournisseur  $model
     * @return mixed
     */
    public function forceDelete(User $user, Fournisseur $model)
    {
        return false;
    }
}
