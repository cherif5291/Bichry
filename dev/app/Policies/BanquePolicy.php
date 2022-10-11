<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Banque;
use Illuminate\Auth\Access\HandlesAuthorization;

class BanquePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the banque can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list banques');
    }

    /**
     * Determine whether the banque can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Banque  $model
     * @return mixed
     */
    public function view(User $user, Banque $model)
    {
        return $user->hasPermissionTo('view banques');
    }

    /**
     * Determine whether the banque can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create banques');
    }

    /**
     * Determine whether the banque can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Banque  $model
     * @return mixed
     */
    public function update(User $user, Banque $model)
    {
        return $user->hasPermissionTo('update banques');
    }

    /**
     * Determine whether the banque can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Banque  $model
     * @return mixed
     */
    public function delete(User $user, Banque $model)
    {
        return $user->hasPermissionTo('delete banques');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Banque  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete banques');
    }

    /**
     * Determine whether the banque can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Banque  $model
     * @return mixed
     */
    public function restore(User $user, Banque $model)
    {
        return false;
    }

    /**
     * Determine whether the banque can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Banque  $model
     * @return mixed
     */
    public function forceDelete(User $user, Banque $model)
    {
        return false;
    }
}
