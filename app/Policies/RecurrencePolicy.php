<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Recurrence;
use Illuminate\Auth\Access\HandlesAuthorization;

class RecurrencePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the recurrence can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list recurrences');
    }

    /**
     * Determine whether the recurrence can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Recurrence  $model
     * @return mixed
     */
    public function view(User $user, Recurrence $model)
    {
        return $user->hasPermissionTo('view recurrences');
    }

    /**
     * Determine whether the recurrence can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create recurrences');
    }

    /**
     * Determine whether the recurrence can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Recurrence  $model
     * @return mixed
     */
    public function update(User $user, Recurrence $model)
    {
        return $user->hasPermissionTo('update recurrences');
    }

    /**
     * Determine whether the recurrence can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Recurrence  $model
     * @return mixed
     */
    public function delete(User $user, Recurrence $model)
    {
        return $user->hasPermissionTo('delete recurrences');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Recurrence  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete recurrences');
    }

    /**
     * Determine whether the recurrence can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Recurrence  $model
     * @return mixed
     */
    public function restore(User $user, Recurrence $model)
    {
        return false;
    }

    /**
     * Determine whether the recurrence can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Recurrence  $model
     * @return mixed
     */
    public function forceDelete(User $user, Recurrence $model)
    {
        return false;
    }
}
