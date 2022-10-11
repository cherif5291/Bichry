<?php

namespace App\Policies;

use App\Models\User;
use App\Models\DevisesMonetaire;
use Illuminate\Auth\Access\HandlesAuthorization;

class DevisesMonetairePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the devisesMonetaire can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list devisesmonetaires');
    }

    /**
     * Determine whether the devisesMonetaire can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\DevisesMonetaire  $model
     * @return mixed
     */
    public function view(User $user, DevisesMonetaire $model)
    {
        return $user->hasPermissionTo('view devisesmonetaires');
    }

    /**
     * Determine whether the devisesMonetaire can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create devisesmonetaires');
    }

    /**
     * Determine whether the devisesMonetaire can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\DevisesMonetaire  $model
     * @return mixed
     */
    public function update(User $user, DevisesMonetaire $model)
    {
        return $user->hasPermissionTo('update devisesmonetaires');
    }

    /**
     * Determine whether the devisesMonetaire can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\DevisesMonetaire  $model
     * @return mixed
     */
    public function delete(User $user, DevisesMonetaire $model)
    {
        return $user->hasPermissionTo('delete devisesmonetaires');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\DevisesMonetaire  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete devisesmonetaires');
    }

    /**
     * Determine whether the devisesMonetaire can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\DevisesMonetaire  $model
     * @return mixed
     */
    public function restore(User $user, DevisesMonetaire $model)
    {
        return false;
    }

    /**
     * Determine whether the devisesMonetaire can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\DevisesMonetaire  $model
     * @return mixed
     */
    public function forceDelete(User $user, DevisesMonetaire $model)
    {
        return false;
    }
}
