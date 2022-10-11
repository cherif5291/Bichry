<?php

namespace App\Policies;

use App\Models\User;
use App\Models\ClientsEntreprise;
use Illuminate\Auth\Access\HandlesAuthorization;

class ClientsEntreprisePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the clientsEntreprise can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list clientsentreprises');
    }

    /**
     * Determine whether the clientsEntreprise can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ClientsEntreprise  $model
     * @return mixed
     */
    public function view(User $user, ClientsEntreprise $model)
    {
        return $user->hasPermissionTo('view clientsentreprises');
    }

    /**
     * Determine whether the clientsEntreprise can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create clientsentreprises');
    }

    /**
     * Determine whether the clientsEntreprise can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ClientsEntreprise  $model
     * @return mixed
     */
    public function update(User $user, ClientsEntreprise $model)
    {
        return $user->hasPermissionTo('update clientsentreprises');
    }

    /**
     * Determine whether the clientsEntreprise can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ClientsEntreprise  $model
     * @return mixed
     */
    public function delete(User $user, ClientsEntreprise $model)
    {
        return $user->hasPermissionTo('delete clientsentreprises');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ClientsEntreprise  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete clientsentreprises');
    }

    /**
     * Determine whether the clientsEntreprise can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ClientsEntreprise  $model
     * @return mixed
     */
    public function restore(User $user, ClientsEntreprise $model)
    {
        return false;
    }

    /**
     * Determine whether the clientsEntreprise can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ClientsEntreprise  $model
     * @return mixed
     */
    public function forceDelete(User $user, ClientsEntreprise $model)
    {
        return false;
    }
}
