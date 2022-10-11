<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Bonus;
use Illuminate\Auth\Access\HandlesAuthorization;

class BonusPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the bonus can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list bonuses');
    }

    /**
     * Determine whether the bonus can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Bonus  $model
     * @return mixed
     */
    public function view(User $user, Bonus $model)
    {
        return $user->hasPermissionTo('view bonuses');
    }

    /**
     * Determine whether the bonus can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create bonuses');
    }

    /**
     * Determine whether the bonus can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Bonus  $model
     * @return mixed
     */
    public function update(User $user, Bonus $model)
    {
        return $user->hasPermissionTo('update bonuses');
    }

    /**
     * Determine whether the bonus can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Bonus  $model
     * @return mixed
     */
    public function delete(User $user, Bonus $model)
    {
        return $user->hasPermissionTo('delete bonuses');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Bonus  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete bonuses');
    }

    /**
     * Determine whether the bonus can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Bonus  $model
     * @return mixed
     */
    public function restore(User $user, Bonus $model)
    {
        return false;
    }

    /**
     * Determine whether the bonus can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Bonus  $model
     * @return mixed
     */
    public function forceDelete(User $user, Bonus $model)
    {
        return false;
    }
}
