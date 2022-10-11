<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Devis;
use Illuminate\Auth\Access\HandlesAuthorization;

class DevisPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the devis can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list alldevis');
    }

    /**
     * Determine whether the devis can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Devis  $model
     * @return mixed
     */
    public function view(User $user, Devis $model)
    {
        return $user->hasPermissionTo('view alldevis');
    }

    /**
     * Determine whether the devis can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create alldevis');
    }

    /**
     * Determine whether the devis can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Devis  $model
     * @return mixed
     */
    public function update(User $user, Devis $model)
    {
        return $user->hasPermissionTo('update alldevis');
    }

    /**
     * Determine whether the devis can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Devis  $model
     * @return mixed
     */
    public function delete(User $user, Devis $model)
    {
        return $user->hasPermissionTo('delete alldevis');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Devis  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete alldevis');
    }

    /**
     * Determine whether the devis can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Devis  $model
     * @return mixed
     */
    public function restore(User $user, Devis $model)
    {
        return false;
    }

    /**
     * Determine whether the devis can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Devis  $model
     * @return mixed
     */
    public function forceDelete(User $user, Devis $model)
    {
        return false;
    }
}
