<?php

namespace App\Policies;

use App\Models\User;
use App\Models\ModelesDevis;
use Illuminate\Auth\Access\HandlesAuthorization;

class ModelesDevisPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the modelesDevis can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list allmodelesdevis');
    }

    /**
     * Determine whether the modelesDevis can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ModelesDevis  $model
     * @return mixed
     */
    public function view(User $user, ModelesDevis $model)
    {
        return $user->hasPermissionTo('view allmodelesdevis');
    }

    /**
     * Determine whether the modelesDevis can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create allmodelesdevis');
    }

    /**
     * Determine whether the modelesDevis can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ModelesDevis  $model
     * @return mixed
     */
    public function update(User $user, ModelesDevis $model)
    {
        return $user->hasPermissionTo('update allmodelesdevis');
    }

    /**
     * Determine whether the modelesDevis can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ModelesDevis  $model
     * @return mixed
     */
    public function delete(User $user, ModelesDevis $model)
    {
        return $user->hasPermissionTo('delete allmodelesdevis');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ModelesDevis  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete allmodelesdevis');
    }

    /**
     * Determine whether the modelesDevis can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ModelesDevis  $model
     * @return mixed
     */
    public function restore(User $user, ModelesDevis $model)
    {
        return false;
    }

    /**
     * Determine whether the modelesDevis can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ModelesDevis  $model
     * @return mixed
     */
    public function forceDelete(User $user, ModelesDevis $model)
    {
        return false;
    }
}
