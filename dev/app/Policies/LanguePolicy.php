<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Langue;
use Illuminate\Auth\Access\HandlesAuthorization;

class LanguePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the langue can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list langues');
    }

    /**
     * Determine whether the langue can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Langue  $model
     * @return mixed
     */
    public function view(User $user, Langue $model)
    {
        return $user->hasPermissionTo('view langues');
    }

    /**
     * Determine whether the langue can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create langues');
    }

    /**
     * Determine whether the langue can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Langue  $model
     * @return mixed
     */
    public function update(User $user, Langue $model)
    {
        return $user->hasPermissionTo('update langues');
    }

    /**
     * Determine whether the langue can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Langue  $model
     * @return mixed
     */
    public function delete(User $user, Langue $model)
    {
        return $user->hasPermissionTo('delete langues');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Langue  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete langues');
    }

    /**
     * Determine whether the langue can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Langue  $model
     * @return mixed
     */
    public function restore(User $user, Langue $model)
    {
        return false;
    }

    /**
     * Determine whether the langue can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Langue  $model
     * @return mixed
     */
    public function forceDelete(User $user, Langue $model)
    {
        return false;
    }
}
