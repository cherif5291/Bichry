<?php

namespace App\Policies;

use App\Models\User;
use App\Models\RecusVente;
use Illuminate\Auth\Access\HandlesAuthorization;

class RecusVentePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the recusVente can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list recusventes');
    }

    /**
     * Determine whether the recusVente can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\RecusVente  $model
     * @return mixed
     */
    public function view(User $user, RecusVente $model)
    {
        return $user->hasPermissionTo('view recusventes');
    }

    /**
     * Determine whether the recusVente can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create recusventes');
    }

    /**
     * Determine whether the recusVente can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\RecusVente  $model
     * @return mixed
     */
    public function update(User $user, RecusVente $model)
    {
        return $user->hasPermissionTo('update recusventes');
    }

    /**
     * Determine whether the recusVente can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\RecusVente  $model
     * @return mixed
     */
    public function delete(User $user, RecusVente $model)
    {
        return $user->hasPermissionTo('delete recusventes');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\RecusVente  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete recusventes');
    }

    /**
     * Determine whether the recusVente can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\RecusVente  $model
     * @return mixed
     */
    public function restore(User $user, RecusVente $model)
    {
        return false;
    }

    /**
     * Determine whether the recusVente can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\RecusVente  $model
     * @return mixed
     */
    public function forceDelete(User $user, RecusVente $model)
    {
        return false;
    }
}
