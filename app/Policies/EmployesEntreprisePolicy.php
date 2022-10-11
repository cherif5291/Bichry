<?php

namespace App\Policies;

use App\Models\User;
use App\Models\EmployesEntreprise;
use Illuminate\Auth\Access\HandlesAuthorization;

class EmployesEntreprisePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the employesEntreprise can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list employesentreprises');
    }

    /**
     * Determine whether the employesEntreprise can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\EmployesEntreprise  $model
     * @return mixed
     */
    public function view(User $user, EmployesEntreprise $model)
    {
        return $user->hasPermissionTo('view employesentreprises');
    }

    /**
     * Determine whether the employesEntreprise can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create employesentreprises');
    }

    /**
     * Determine whether the employesEntreprise can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\EmployesEntreprise  $model
     * @return mixed
     */
    public function update(User $user, EmployesEntreprise $model)
    {
        return $user->hasPermissionTo('update employesentreprises');
    }

    /**
     * Determine whether the employesEntreprise can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\EmployesEntreprise  $model
     * @return mixed
     */
    public function delete(User $user, EmployesEntreprise $model)
    {
        return $user->hasPermissionTo('delete employesentreprises');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\EmployesEntreprise  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete employesentreprises');
    }

    /**
     * Determine whether the employesEntreprise can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\EmployesEntreprise  $model
     * @return mixed
     */
    public function restore(User $user, EmployesEntreprise $model)
    {
        return false;
    }

    /**
     * Determine whether the employesEntreprise can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\EmployesEntreprise  $model
     * @return mixed
     */
    public function forceDelete(User $user, EmployesEntreprise $model)
    {
        return false;
    }
}
