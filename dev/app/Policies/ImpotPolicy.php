<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Impot;
use Illuminate\Auth\Access\HandlesAuthorization;

class ImpotPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the impot can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list impots');
    }

    /**
     * Determine whether the impot can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Impot  $model
     * @return mixed
     */
    public function view(User $user, Impot $model)
    {
        return $user->hasPermissionTo('view impots');
    }

    /**
     * Determine whether the impot can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create impots');
    }

    /**
     * Determine whether the impot can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Impot  $model
     * @return mixed
     */
    public function update(User $user, Impot $model)
    {
        return $user->hasPermissionTo('update impots');
    }

    /**
     * Determine whether the impot can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Impot  $model
     * @return mixed
     */
    public function delete(User $user, Impot $model)
    {
        return $user->hasPermissionTo('delete impots');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Impot  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete impots');
    }

    /**
     * Determine whether the impot can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Impot  $model
     * @return mixed
     */
    public function restore(User $user, Impot $model)
    {
        return false;
    }

    /**
     * Determine whether the impot can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Impot  $model
     * @return mixed
     */
    public function forceDelete(User $user, Impot $model)
    {
        return false;
    }
}
