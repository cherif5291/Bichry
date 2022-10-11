<?php

namespace App\Policies;

use App\Models\User;
use App\Models\PiecesJointe;
use Illuminate\Auth\Access\HandlesAuthorization;

class PiecesJointePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the piecesJointe can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list piecesjointes');
    }

    /**
     * Determine whether the piecesJointe can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\PiecesJointe  $model
     * @return mixed
     */
    public function view(User $user, PiecesJointe $model)
    {
        return $user->hasPermissionTo('view piecesjointes');
    }

    /**
     * Determine whether the piecesJointe can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create piecesjointes');
    }

    /**
     * Determine whether the piecesJointe can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\PiecesJointe  $model
     * @return mixed
     */
    public function update(User $user, PiecesJointe $model)
    {
        return $user->hasPermissionTo('update piecesjointes');
    }

    /**
     * Determine whether the piecesJointe can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\PiecesJointe  $model
     * @return mixed
     */
    public function delete(User $user, PiecesJointe $model)
    {
        return $user->hasPermissionTo('delete piecesjointes');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\PiecesJointe  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete piecesjointes');
    }

    /**
     * Determine whether the piecesJointe can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\PiecesJointe  $model
     * @return mixed
     */
    public function restore(User $user, PiecesJointe $model)
    {
        return false;
    }

    /**
     * Determine whether the piecesJointe can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\PiecesJointe  $model
     * @return mixed
     */
    public function forceDelete(User $user, PiecesJointe $model)
    {
        return false;
    }
}
