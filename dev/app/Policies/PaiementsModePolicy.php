<?php

namespace App\Policies;

use App\Models\User;
use App\Models\PaiementsMode;
use Illuminate\Auth\Access\HandlesAuthorization;

class PaiementsModePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the paiementsMode can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list paiementsmodes');
    }

    /**
     * Determine whether the paiementsMode can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\PaiementsMode  $model
     * @return mixed
     */
    public function view(User $user, PaiementsMode $model)
    {
        return $user->hasPermissionTo('view paiementsmodes');
    }

    /**
     * Determine whether the paiementsMode can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create paiementsmodes');
    }

    /**
     * Determine whether the paiementsMode can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\PaiementsMode  $model
     * @return mixed
     */
    public function update(User $user, PaiementsMode $model)
    {
        return $user->hasPermissionTo('update paiementsmodes');
    }

    /**
     * Determine whether the paiementsMode can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\PaiementsMode  $model
     * @return mixed
     */
    public function delete(User $user, PaiementsMode $model)
    {
        return $user->hasPermissionTo('delete paiementsmodes');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\PaiementsMode  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete paiementsmodes');
    }

    /**
     * Determine whether the paiementsMode can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\PaiementsMode  $model
     * @return mixed
     */
    public function restore(User $user, PaiementsMode $model)
    {
        return false;
    }

    /**
     * Determine whether the paiementsMode can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\PaiementsMode  $model
     * @return mixed
     */
    public function forceDelete(User $user, PaiementsMode $model)
    {
        return false;
    }
}
