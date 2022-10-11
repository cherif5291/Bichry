<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Fonctionnalite;
use Illuminate\Auth\Access\HandlesAuthorization;

class FonctionnalitePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the fonctionnalite can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list fonctionnalites');
    }

    /**
     * Determine whether the fonctionnalite can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Fonctionnalite  $model
     * @return mixed
     */
    public function view(User $user, Fonctionnalite $model)
    {
        return $user->hasPermissionTo('view fonctionnalites');
    }

    /**
     * Determine whether the fonctionnalite can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create fonctionnalites');
    }

    /**
     * Determine whether the fonctionnalite can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Fonctionnalite  $model
     * @return mixed
     */
    public function update(User $user, Fonctionnalite $model)
    {
        return $user->hasPermissionTo('update fonctionnalites');
    }

    /**
     * Determine whether the fonctionnalite can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Fonctionnalite  $model
     * @return mixed
     */
    public function delete(User $user, Fonctionnalite $model)
    {
        return $user->hasPermissionTo('delete fonctionnalites');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Fonctionnalite  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete fonctionnalites');
    }

    /**
     * Determine whether the fonctionnalite can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Fonctionnalite  $model
     * @return mixed
     */
    public function restore(User $user, Fonctionnalite $model)
    {
        return false;
    }

    /**
     * Determine whether the fonctionnalite can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Fonctionnalite  $model
     * @return mixed
     */
    public function forceDelete(User $user, Fonctionnalite $model)
    {
        return false;
    }
}
