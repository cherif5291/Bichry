<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Comptescomptable;
use Illuminate\Auth\Access\HandlesAuthorization;

class ComptescomptablePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the comptescomptable can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list comptescomptables');
    }

    /**
     * Determine whether the comptescomptable can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Comptescomptable  $model
     * @return mixed
     */
    public function view(User $user, Comptescomptable $model)
    {
        return $user->hasPermissionTo('view comptescomptables');
    }

    /**
     * Determine whether the comptescomptable can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create comptescomptables');
    }

    /**
     * Determine whether the comptescomptable can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Comptescomptable  $model
     * @return mixed
     */
    public function update(User $user, Comptescomptable $model)
    {
        return $user->hasPermissionTo('update comptescomptables');
    }

    /**
     * Determine whether the comptescomptable can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Comptescomptable  $model
     * @return mixed
     */
    public function delete(User $user, Comptescomptable $model)
    {
        return $user->hasPermissionTo('delete comptescomptables');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Comptescomptable  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete comptescomptables');
    }

    /**
     * Determine whether the comptescomptable can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Comptescomptable  $model
     * @return mixed
     */
    public function restore(User $user, Comptescomptable $model)
    {
        return false;
    }

    /**
     * Determine whether the comptescomptable can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Comptescomptable  $model
     * @return mixed
     */
    public function forceDelete(User $user, Comptescomptable $model)
    {
        return false;
    }
}
