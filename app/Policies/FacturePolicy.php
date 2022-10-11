<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Facture;
use Illuminate\Auth\Access\HandlesAuthorization;

class FacturePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the facture can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list factures');
    }

    /**
     * Determine whether the facture can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Facture  $model
     * @return mixed
     */
    public function view(User $user, Facture $model)
    {
        return $user->hasPermissionTo('view factures');
    }

    /**
     * Determine whether the facture can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create factures');
    }

    /**
     * Determine whether the facture can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Facture  $model
     * @return mixed
     */
    public function update(User $user, Facture $model)
    {
        return $user->hasPermissionTo('update factures');
    }

    /**
     * Determine whether the facture can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Facture  $model
     * @return mixed
     */
    public function delete(User $user, Facture $model)
    {
        return $user->hasPermissionTo('delete factures');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Facture  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete factures');
    }

    /**
     * Determine whether the facture can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Facture  $model
     * @return mixed
     */
    public function restore(User $user, Facture $model)
    {
        return false;
    }

    /**
     * Determine whether the facture can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Facture  $model
     * @return mixed
     */
    public function forceDelete(User $user, Facture $model)
    {
        return false;
    }
}
