<?php

namespace App\Policies;

use App\Models\User;
use App\Models\PaiementsModalite;
use Illuminate\Auth\Access\HandlesAuthorization;

class PaiementsModalitePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the paiementsModalite can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list paiementsmodalites');
    }

    /**
     * Determine whether the paiementsModalite can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\PaiementsModalite  $model
     * @return mixed
     */
    public function view(User $user, PaiementsModalite $model)
    {
        return $user->hasPermissionTo('view paiementsmodalites');
    }

    /**
     * Determine whether the paiementsModalite can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create paiementsmodalites');
    }

    /**
     * Determine whether the paiementsModalite can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\PaiementsModalite  $model
     * @return mixed
     */
    public function update(User $user, PaiementsModalite $model)
    {
        return $user->hasPermissionTo('update paiementsmodalites');
    }

    /**
     * Determine whether the paiementsModalite can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\PaiementsModalite  $model
     * @return mixed
     */
    public function delete(User $user, PaiementsModalite $model)
    {
        return $user->hasPermissionTo('delete paiementsmodalites');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\PaiementsModalite  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete paiementsmodalites');
    }

    /**
     * Determine whether the paiementsModalite can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\PaiementsModalite  $model
     * @return mixed
     */
    public function restore(User $user, PaiementsModalite $model)
    {
        return false;
    }

    /**
     * Determine whether the paiementsModalite can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\PaiementsModalite  $model
     * @return mixed
     */
    public function forceDelete(User $user, PaiementsModalite $model)
    {
        return false;
    }
}
