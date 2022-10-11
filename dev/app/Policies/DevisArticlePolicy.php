<?php

namespace App\Policies;

use App\Models\User;
use App\Models\DevisArticle;
use Illuminate\Auth\Access\HandlesAuthorization;

class DevisArticlePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the devisArticle can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list devisarticles');
    }

    /**
     * Determine whether the devisArticle can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\DevisArticle  $model
     * @return mixed
     */
    public function view(User $user, DevisArticle $model)
    {
        return $user->hasPermissionTo('view devisarticles');
    }

    /**
     * Determine whether the devisArticle can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create devisarticles');
    }

    /**
     * Determine whether the devisArticle can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\DevisArticle  $model
     * @return mixed
     */
    public function update(User $user, DevisArticle $model)
    {
        return $user->hasPermissionTo('update devisarticles');
    }

    /**
     * Determine whether the devisArticle can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\DevisArticle  $model
     * @return mixed
     */
    public function delete(User $user, DevisArticle $model)
    {
        return $user->hasPermissionTo('delete devisarticles');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\DevisArticle  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete devisarticles');
    }

    /**
     * Determine whether the devisArticle can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\DevisArticle  $model
     * @return mixed
     */
    public function restore(User $user, DevisArticle $model)
    {
        return false;
    }

    /**
     * Determine whether the devisArticle can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\DevisArticle  $model
     * @return mixed
     */
    public function forceDelete(User $user, DevisArticle $model)
    {
        return false;
    }
}
