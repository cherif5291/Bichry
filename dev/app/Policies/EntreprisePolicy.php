<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Entreprise;
use Illuminate\Auth\Access\HandlesAuthorization;

class EntreprisePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the entreprise can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list entreprises');
    }

    /**
     * Determine whether the entreprise can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Entreprise  $model
     * @return mixed
     */
    public function view(User $user, Entreprise $model)
    {
        return $user->hasPermissionTo('view entreprises');
    }

    /**
     * Determine whether the entreprise can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create entreprises');
    }

    /**
     * Determine whether the entreprise can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Entreprise  $model
     * @return mixed
     */
    public function update(User $user, Entreprise $model)
    {
        return $user->hasPermissionTo('update entreprises');
    }

    /**
     * Determine whether the entreprise can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Entreprise  $model
     * @return mixed
     */
    public function delete(User $user, Entreprise $model)
    {
        return $user->hasPermissionTo('delete entreprises');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Entreprise  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete entreprises');
    }

    /**
     * Determine whether the entreprise can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Entreprise  $model
     * @return mixed
     */
    public function restore(User $user, Entreprise $model)
    {
        return false;
    }

    /**
     * Determine whether the entreprise can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Entreprise  $model
     * @return mixed
     */
    public function forceDelete(User $user, Entreprise $model)
    {
        return false;
    }
}
